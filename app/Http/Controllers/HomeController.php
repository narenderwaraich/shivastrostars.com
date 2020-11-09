<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WhatsappBtnFacade;
use WhatsappBtn;
use App\Youtube;
use Auth;
use Redirect;
use Carbon\Carbon;
use App\CartStorage;
use App\Product;
use App\Gellery;
use App\BanerSlide;
use App\Rashifal;
use App\Astrologer;
use App\SectionImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Youtube::latest()->paginate(6);
        $products = Product::orderBy('created_at','desc')->paginate(9);
        $gellery = Gellery::orderBy('created_at','desc')->paginate(10);
        $astrologers = Astrologer::where('verified','=',2)->get(); //dd($astrologers);
        $paraSection = SectionImage::where('page_name','=','home')->where('section','=','parallax')->first(); //dd($paraSection);
        $astroWorkMainSection = SectionImage::where('page_name','=','home')->where('section','=','main_section')->first(); //dd($astroWorkMainSection);
        $current = Carbon::now();
        $todayDate = $current->format('Y-m-d'); //dd($todayDate);
        $rashi = Rashifal::where('today_date','=',$todayDate)->orderBy('created_at','desc')->paginate(1); //dd($rashi);
        // $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        // foreach ($covid as $covidData) {
        //     $covid19 = Covid19::whereDate('created_at', $yesterday )->first();

        //     $covidData->lastConfirmed = $covid19 ? $covid19->confirmed : 0;
        //     $covidData->lastRecovered = $covid19 ? $covid19->recovered : 0;
        //     $covidData->lastDeceased = $covid19 ? $covid19->deceased : 0;
        //     $covidData->lastActive = $covid19 ? $covid19->active : 0;
        // }
        $banner = BanerSlide::where('page_name','=','home')->first(); //dd($banner);
        if($banner){
            $title = $banner->title;
            $description = $banner->description; 
        }else{
            $title = "";
            $description = "";
        }

        $num = "9017109900";
        $msg = "hlo i am here";
        $opt = ['label' => 'Click to Chat', 'class' => 'btn btn-success'];
        $whatsappBtn = $this->make($num,$msg,$opt);


        if(Auth::check()){
            $userId = Auth::id();
            $cartCollection = CartStorage::where('user_id',$userId)->get();
            $subTotal = DB::table("cart_storages")->where('user_id',$userId)->sum('subtotal');       
            return view('index',compact('title','description','rashi'),['banner' => $banner,'products' =>$products, 'videos' => $videos,'cartCollection' =>$cartCollection, 'subTotal' =>$subTotal,'gellery' =>$gellery, 'astrologers' =>$astrologers, 'paraSection' =>$paraSection, 'astroWorkMainSection' =>$astroWorkMainSection, 'whatsappBtn' => $whatsappBtn]);
        }else{
          return view('index',compact('title','description','rashi'),['banner' => $banner, 'products' => $products, 'videos' => $videos,'gellery' =>$gellery, 'astrologers' =>$astrologers, 'paraSection' =>$paraSection, 'astroWorkMainSection' =>$astroWorkMainSection, 'whatsappBtn' => $whatsappBtn]);  
        }
        
    }

    public function chatW(){
        $num = "9017109900";
        $msg = "hlo";
        $opt = ['label' => 'Click to Chat', 'class' => 'btn btn-success'];
        $data = $this->make($num,$msg,$opt);
        // $opt = ['label' => 'Click to Chat', 'class' => 'btn btn-success'];
         //$btn = WhatsappBtn::($num,$msg,$opt);
         return $data;
        // return redirect('https://web.whatsapp.com/');

      }

    private $base_url;
    private $options = [];
    public function __construct()
    {
        $this->base_url = 'https://wa.me';
        $this->options['label'] = 'Click to Chat';
        $this->options['class'] = '';
    }


    public function make($number, $message='', $options = array())
    {
        $options = array_replace($this->options,$options);
        $link = $this->link($number, $message);

        return  '<a href="'.$link.'">'.
                    '<button type="button" class="'.$options['class'].'">'.
                        $options['label'] .
                    '</button>'.
                '</a>';
    }
    public function link($number, $message=''){
        $final_url = $this->base_url . '/'.$this->filterNumber($number);
        return $final_url . "?" . http_build_query(['text' => $message]);
    }

    private function filterNumber($number){
        $number = str_replace(['(',')','-','/','+'],'',$number);
        $number = (int)$number;
        return $number;
    }


    public function termService()
    {
        $banner = BanerSlide::where('page_name','=','term-of-services')->first(); //dd($banner);
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
            return view('term-of-services',compact('title','description'),['banner' => $banner,'cartCollection' =>$cartCollection, 'subTotal' =>$subTotal]);
        }else{
          return view('term-of-services',compact('title','description'),['banner' => $banner]);  
        }
        
    }

    public function privacyPolicy()
    {
        $banner = BanerSlide::where('page_name','=','privacy-policy')->first(); //dd($banner);
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
            return view('privacy-policy',compact('title','description'),['banner' => $banner,'cartCollection' =>$cartCollection, 'subTotal' =>$subTotal]);
        }else{
          return view('privacy-policy',compact('title','description'),['bannere' => $banner]);  
        }
        
    }
}
