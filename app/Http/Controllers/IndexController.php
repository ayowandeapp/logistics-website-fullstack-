<?php

namespace App\Http\Controllers;

use App\PickUpDetail;
use App\CustomerInfo;
use App\PackageDetail;
use App\Service;
use App\GeneralSetting;
use App\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $services = Service::get();
        $abouts = About::get();
        $meta = GeneralSetting::first();
        $meta_title= $meta->meta_title;
        $meta_description = $meta->meta_description;
        $meta_keywords = $meta->meta_keywords;
        $meta_logo = $meta->image;
        $footer = DB::table('footers')->get()->last();
        return view('index')->with(compact('meta_title', 'meta_description','meta_keywords','services','abouts','meta_logo', 'footer'));
    }
    public function trackOrder(Request $request){
    	
    	if($request->ismethod('post')){

        $meta = GeneralSetting::first();
        $meta_logo = $meta->image;

        $footer = DB::table('footers')->get()->last();
            //validation 
            $request->validate([
                'phone_no'=>'required',
                'order_no'=>'required']);
             
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$ordernNoCount = PickUpDetail::where('order_number', $data['order_no'])->count();
    		if($ordernNoCount >0){
    			//if exist
    			$orderPhone = CustomerInfo::where(['order_number'=>$data['order_no'], 'phone_no'=>$data['phone_no']])->count();
    			if($orderPhone > 0){
                    $meta_title= "WanaMove - Track Order";
                    $meta_description = "Track your Order";
                    $meta_keywords = "logistics website, ecommerce, track order";
    				//return values
    				$orderDetails = PickUpDetail::where(['order_number'=> $data['order_no']])->first();
			        $orderDetails['customer']= CustomerInfo::where(['order_number'=>$data['order_no']])->first();
			        $orderDetails['package']= PackageDetail::where(['order_number'=>$data['order_no']])->get();
			        $orderDetails= json_decode(json_encode($orderDetails));
			        //echo "<pre>"; print_r($orderDetails); die;
			         return view('track_order')->with(compact('orderDetails','meta_title', 'meta_description','meta_keywords', 'meta_logo','footer'));

    			}else{
    				return redirect('/')->with('error_message',' Order does not Exist!, Try Again.');
    			}

    		}else{
    			return redirect('/')->with('error_message',' Order does not Exist!, Try Again.');
    		}

    	}
    	return redirect('/');

    }
    public function contact(Request $request){
        if($request->ismethod('post')){
             //validation 
            $request->validate([
                'name'=>'required|string',
                'message'=>'required',
                'subject'=>'required|string',
                'email'=>'required|email|max:255']);
            $data = $request->all();

            $subject = $data['subject'];
            //echo '<pre>'; print_r($subject); die;
            $email = 'ayooluwa71@gmail.com';
            $messageData = ['email'=>$data['email'],'detail'=>$data['message'],'name'=>$data['name'],'subject'=>$data['subject']];
                $email = $data['email'];
            Mail::send('emails.contact', $messageData,function($message) use($email){
                $message->to($email)->subject('Confirm your WanaBuy email');
            });
                return redirect('/')->with('success_message', 'Message Sent Successfully');
        }
        return redirect('/');
       

    }
}
