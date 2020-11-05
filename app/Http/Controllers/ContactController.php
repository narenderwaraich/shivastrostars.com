<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Redirect;
use Toastr;
use Validator;
use App\Contact;
use App\CartStorage;
use Auth;
use App\User;
use App\SendMail;
use Mail;
use App\Mail\ContactReply;
use App\Mail\SendEMail;
use App\Mail\EMail;
use App\Setting;
use App\Order;
use App\Product;
use App\BanerSlide;
use App\Mail\ContactUs;
use App\SectionImage;

class ContactController extends Controller
{
    public function aboutPage(){
        $banner = BanerSlide::where('page_name','=','about-us')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = "";
            $description = "";
        }
        $mainSection = SectionImage::where('page_name','=','about-us')->where('section','=','main_section')->first(); //dd($mainSection);
        $section1 = SectionImage::where('page_name','=','about-us')->where('section','=','section1')->first(); //dd($section1);
        $section2 = SectionImage::where('page_name','=','about-us')->where('section','=','section2')->first(); //dd($section2);
        if(Auth::check()){
            $userId = Auth::id();
            $cartCollection = CartStorage::where('user_id',$userId)->get();
            $subTotal = DB::table("cart_storages")->where('user_id',$userId)->sum('subtotal');
            return view('about',compact('title','description'),['banner' =>$banner, 'cartCollection' =>$cartCollection, 'subTotal' => $subTotal, 'mainSection' => $mainSection, 'section1' => $section1, 'section2' => $section2]);
        }else{
            return view('about',compact('title','description'),['banner' =>$banner, 'mainSection' => $mainSection, 'section1' => $section1, 'section2' => $section2]);
        }
    }
    
    public function get(){
        $banner = BanerSlide::where('page_name','=','contact-us')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = "";
            $description = "";
        }
        if(Auth::check()){
            $userId = Auth::id();
            $cartCollection = CartStorage::where('user_id',$userId)->get();
            $subTotal = DB::table("cart_storages")->where('user_id',$userId)->sum('subtotal');
            return view('contact',compact('title','description'),['banner' =>$banner, 'cartCollection' =>$cartCollection, 'subTotal' => $subTotal]);
        }else{
            return view('contact',compact('title','description'),['banner' =>$banner]);
        }
    }


    public function store(Request $request){
    $validate = $this->validate(request(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:255',
            'phone_number'=>'required|string|max:10|min:10',
            'message'=>'required|string|max:255',
          ]);
          if(!$validate){
            Redirect::back()->withInput();
          }
          $data = request(['name','message','email','phone_number']);
          $mail = $request->email;
          $query = Contact::create($data);
          $setting = Setting::find(1);
          $adminMail = $setting->admin_mail;
          Mail::to($adminMail)->send(new ContactUs($query));
          $this->returnBackReplyMail($mail);
    Toastr::success('Message Sent', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/');
   } 


   public function contactUs(Request $request){
    $validate = $this->validate(request(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:255',
            'message'=>'required|string|max:255',
          ]);
          if(!$validate){
            Redirect::back()->withInput();
          }
          $data = request(['name','message','email']);
          $query = Contact::create($data);
          $setting = Setting::find(1);
          $adminMail = $setting->admin_mail;
          Mail::to($adminMail)->send(new ContactUs($query));
    Toastr::success('Message Sent', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/');
   }
   
   public function getContact(){
    if(Auth::check()){
    if(Auth::user()->role == "admin" || Auth::user()->role == "administrator"){
          $getOrders = Order::where('status','=',"Pending")->get(); //dd($getOrders);
          $contacts = Contact::where('status','=',"Pending")->get(); //dd($contacts);
          $getContacts = Contact::orderBy('created_at','desc')->paginate(10); //dd($contacts);
        return view('Admin.contact',compact('getOrders','contacts'),['getContacts' =>$getContacts]);
        }
    }else{
        return redirect()->to('/login');
    }
   }
   
   public function contactReplyGet($id){
    if(Auth::check()){
    if(Auth::user()->role == "admin" || Auth::user()->role == "administrator"){
        $contact = Contact::find($id); //dd($contact);
        return view('Admin.contactReply',compact('getOrders','contacts'),['contact' =>$contact]);
        }
    }else{
        return redirect()->to('/login');
    }
   }

   public function contactMarkReply($id){
    if(Auth::check()){
    if(Auth::user()->role == "admin" || Auth::user()->role == "administrator"){
        $status['status'] = "Reply";
        Contact::where('id',$id)->update($status);
        Toastr::success('Message mark reply', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
        }
    }else{
        return redirect()->to('/login');
    }
   }

   public function contactReply(Request $request){
      $email = $request->email;
      $reply = $request->reply;
      $mesg_id = $request->id;
      $status['status'] = "Reply";
      $status['reply_message'] = $reply;
      Contact::where('id',$mesg_id)->update($status);
      Mail::to($email)->send(new ContactReply($reply));
      if (Mail::failures()) {
        // return response showing failed emails
        Toastr::error('Message not Send', 'Error', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
      }
      Toastr::success('Message Reply', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
   }

   public function sendMailView(){
    if(Auth::check()){
    if(Auth::user()->role == "admin" || Auth::user()->role == "administrator"){
          $getOrders = Order::where('status','=',"Pending")->get(); //dd($getOrders);
          $contacts = Contact::where('status','=',"Pending")->get(); //dd($contacts);
        return view('Admin.send-Mail',compact('getOrders','contacts'));
        }
    }else{
        return redirect()->to('/login');
    }
   }

   public function sendMail(Request $request){
      $email = $request->email;
      $subject = $request->subject;
      $message = $request->message;
      $document = $request->document;

      if ($document->getError() == 1) {
        $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
        $error = 'The document size must be less than ' . $max_size . 'Mb.';
        Toastr::error($error, 'Error', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
      }
      $data = [
        'subject' => $subject,
        'document' => $document,
        'message' => $message
      ];
      //dd($data);
      // $data = [];
      // $data['message'] = $message;
      // $data['subject'] = $subject;
      Mail::to($email)->send(new EMail($data));
      Toastr::success('Mail Send', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->to('/admin');
   }


   public function SendNotificationMail(Request $request){
          $ids = $request->ids; //dd($ids);
          $id = explode(",",$ids);
          $alluser = User::whereIn('id',$id)->where('verified', '=', 1)->get(); //dd($alluser);
          $subject = $request->subject;
          $message = $request->message;
          foreach ($alluser as $userNumber => $user) {
          $data = [];
          $data['name'] = $user->name;
          $data['email'] = $user->email;
          $data['user_id'] = $user->id;
          $data['message'] = $message;
          $data['subject'] = $subject;
          $data['created_at'] = Carbon::now();
          Mail::to($user->email)->send(new SendEMail($data));
          // $send = SendMail::create($data);
          }
          Toastr::success('Mail Send', 'Success', ["positionClass" => "toast-top-right"]);
          return redirect()->to('/user');
      
   }

   public function returnBackReplyMail($mail){
    $reply ="";
     Mail::to($mail)->send(new ContactReply($reply));
   }
}