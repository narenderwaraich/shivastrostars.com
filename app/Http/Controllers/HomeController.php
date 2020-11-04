<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Youtube;
use Auth;
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
        $sectionImg = SectionImage::where('page_name','=','home')->first(); //dd($sectionImg);
        // $current = Carbon::now();
        // $todayDate = $current->format('Y-m-d'); //dd($todayDate);
        // $rashi = Rashifal::where('today_date','=',$todayDate)->orderBy('created_at','desc')->paginate(1); //dd($rashi);
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
            $title = "Vedic Astrology & Buy Vastu Products Online";
            $description = "Astrorightway provides free Vedic astrology and kundli remedies. Join our divya Jyoti helping plan and buy vastu astrology products online.";
        }
        if(Auth::check()){
            $userId = Auth::id();
            $cartCollection = CartStorage::where('user_id',$userId)->get();
            $subTotal = DB::table("cart_storages")->where('user_id',$userId)->sum('subtotal');       
            return view('index',compact('title','description','rashi'),['banner' => $banner,'products' =>$products, 'videos' => $videos,'cartCollection' =>$cartCollection, 'subTotal' =>$subTotal,'gellery' =>$gellery, 'astrologers' =>$astrologers, 'sectionImg' =>$sectionImg]);
        }else{
          return view('index',compact('title','description'),['banner' => $banner, 'products' => $products, 'videos' => $videos,'gellery' =>$gellery, 'astrologers' =>$astrologers, 'sectionImg' =>$sectionImg]);  
        }
        
    }

    public function termService()
    {
        $banner = BanerSlide::where('page_name','=','term-of-services')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
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
