<?php

namespace App\Http\Controllers;

use App\whatappChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Redirect;
use Toastr;
//use WhatsappBtnFacade;
//use WhatsappBtn;

class WhatappChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $getWhatsApp = whatappChat::orderBy('created_at','desc')->paginate(10); //dd($getWhatsApp);
        return view('Admin.whatsapp-list',['getWhatsApp' =>$getWhatsApp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:10|min:10',
            'message' => 'required|max:500',
        ]);
        if(!$validate){
                        Redirect::back()->withInput();
                        }
        $data = request(['name','phone','message']);
        $customerID = whatappChat::orderBy('id', 'DESC')->pluck('order_id')->first();
            //dd($customerID);
            if($customerID){
              $getNumber = explode('CUS', $customerID)[1];  
            $newCustomerID = 'CUS'.str_pad($getNumber + 1, 5, "0", STR_PAD_LEFT);
            $newInvNumber = explode('CUS', $newCustomerID)[1]; //dd($checkNewNumber); 
            
            }else{
              $newCustomerID = "CUS00001";
            } 
         $data['order_id'] = $newCustomerID;
         whatappChat::create($data);
         $num = "+919358027151"; //.$request->phone;
         $msg = $request->message;
         $opt = ['label' => 'Click to Chat', 'class' => 'btn btn-success'];
         $whatsappBtn = $this->make($num,$msg,$opt);

        return redirect($whatsappBtn);
        
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

        return  $link;

        // return  '<a href="'.$link.'">'.
        //             '<button type="button" class="'.$options['class'].'">'.
        //                 $options['label'] .
        //             '</button>'.
        //         '</a>';
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

    /**
     * Display the specified resource.
     *
     * @param  \App\whatappChat  $whatappChat
     * @return \Illuminate\Http\Response
     */
    public function show(whatappChat $whatappChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\whatappChat  $whatappChat
     * @return \Illuminate\Http\Response
     */
    public function edit(whatappChat $whatappChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\whatappChat  $whatappChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, whatappChat $whatappChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\whatappChat  $whatappChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(whatappChat $whatappChat)
    {
        //
    }
}
