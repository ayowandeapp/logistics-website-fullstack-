<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use App\PickUpDetail;
use App\CustomerInfo;
use App\PackageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class MerchantController extends Controller
{
    
    public function dashboard(){
        if(Session::get('adminDetail')['admin'] == 0){
            return redirect('/merchant/pickup');
        }
        $userCount = User::count();
        $orderCount= PickUpDetail::count();
        $meta_title= "Wanamove - Merchant Dashboard";
        $meta_description = "Merchant Dashboard";
        $meta_keywords = "logistics website, ecommerce, dashboard";
        return view('merchants.dashboard')->with(compact('userCount','orderCount','meta_title', 'meta_description','meta_keywords'));
    }
    public function settings(){
        return view('merchants.settings');
    }
    public function checkPwd(Request $request){

        $data = $request->all();
        $current_password = $data['current_pwd'];
        $merchant = User::where(['id'=> Auth::user()->id,'email'=> Auth::user()->email, 'merchant'=>1])->first();
        if(Hash::check($current_password,$merchant->password)){

                echo "true"; die;
            }else{
                echo "false"; die;
            }

        }
    public function updatePassword(Request $request){
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $current_password = $data['current_password'];
            $merchant = User::where(['id'=> Auth::user()->id,'email'=> Auth::user()->email, 'merchant'=>1])->first();
            if(Hash::check($current_password,$merchant->password)){
                $password = bcrypt($data['new_password']);
                User::where('email', Auth::user()->email)->update(['password'=>$password]);
                return redirect('/merchant/settings')->with('success_message', 'Password updated Successfully!');
            }else{
                return redirect('/merchant/settings')->with('error_message', 'Incorrect Current Password');
                //echo "false"; die;
            }
        }
    }
    public function addDetails(Request $request){
        $countries = DB::table('countries')->get();
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $userDetail = new UserDetail;
            $userDetail->user_id = Auth::user()->id;
            $userDetail->first_name = $data['first_name'];
            $userDetail->last_name = $data['last_name'];
            $userDetail->country = $data['country_name'];
            $userDetail->state = $data['state'];
            $userDetail->city = $data['state'];
            $userDetail->gender = $data['gender'];
            $userDetail->dob = $data['dob'];
            $userDetail->about_myself = $data['bio'];
            $userDetail->save();
            return redirect()->back()->with('success_message', 'Profile added Successfully');
        }
        $meta_title= "Wanamove - Merchant - Profile";
        $meta_description = "Merchant Profile";
        $meta_keywords = "logistics website, profile";
        return view('merchants.add_profile')->with(compact('countries','meta_title', 'meta_description','meta_keywords'));
    }
    public function editDetails(Request $request){
        $countries = DB::table('countries')->get();
        $user_id = Auth::user()->id;
        $viewProfile = User::with('userDetail')->where('id', $user_id)->first();
        $viewProfile= json_decode(json_encode($viewProfile));
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $userDetail = UserDetail::where('user_id', $user_id)->update([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'country'=>$data['country_name'],
                'state'=>$data['state'],
                'gender'=>$data['gender'],
                'dob'=>$data['dob'],
                'about_myself'=>$data['bio']]);
            return redirect('/merchant/view_profile')->with('success_message', 'Profile added Successfully');
        }
        $meta_title= "Wanamove - Merchant - Profile";
        $meta_description = "Merchant Profile";

        return view('merchants.edit_profile')->with(compact('countries','viewProfile','meta_title', 'meta_description'));
    }
    public function viewProfile(){
        $user_id = Auth::user()->id;
        $viewProfile = User::with('userDetail')->where('id', $user_id)->first();
        $viewProfile= json_decode(json_encode($viewProfile));
        //echo "<pre>"; print_r($viewProfile); die;
        $meta_title= "Wanamove - Merchant - Profile";
        $meta_description = "Merchant Profile";
        return view('merchants.profile')->with(compact('viewProfile','meta_title', 'meta_description'));
    }
    public function pickUp(Request $request){
        $user_id = Auth::user()->id;
        if($request->isMethod('post')){
           //validation 
            $request->validate([
                'Payment_type'=>'required',
                'first_name'=>'required|string',
                'state'=>'required|string',
                'street'=>'required',
                'phone'=>'required|numeric',
                'last_name'=>'required|string',
                'order_number'=>'required|unique:pick_up_details',
                'govern'=>'required|string',
                'alt_phone'=>'required|numeric',
                'desc'=>'required',
                'price'=>'required',
                'qty'=>'required',
                //'item_total'=>'required|numeric',
                'shipping_cost'=>'required|numeric',
                'email'=>'required|email|max:255']);

            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            //if order number exist
            $orderNumCount = PickUpDetail::where('order_number',$data['order_number'])->count();
            if($orderNumCount >0){
                return redirect()->back()->with('error_message', 'Order number already exist');
                }
         
            //insert in pickup_detail

            //get grandtotal
            foreach($data['desc'] as $key =>$val){
                if(!empty($val)){
                    $qty = $data['qty'][$key];
                    $price = $data['price'][$key];
                    $subtotal[] = $qty * $price;
                }
            }
            $order_total= array_sum($subtotal);
            $grandTotal =$order_total + $data['shipping_cost'];

            //save to pickupDetail table
            $pickupOrder = new PickUpDetail;
            $pickupOrder->user_id = $user_id;
            $pickupOrder->order_number = $data['order_number'];
            $pickupOrder->first_name = $data['first_name'];
            $pickupOrder->payment_method = $data['Payment_type'];
            $pickupOrder->pickup_status = 'New';
            $pickupOrder->order_total = $order_total;
            $pickupOrder->shipping_cost = $data['shipping_cost'];
            $pickupOrder->grand_price = $grandTotal;
            $pickupOrder->save();

            //save to customer_info table
            $customerInfo = new CustomerInfo;
            $customerInfo->user_id = $user_id;
            $customerInfo->order_number = $data['order_number'];
            $customerInfo->first_name = $data['first_name'];
            $customerInfo->last_name = $data['last_name'];
            $customerInfo->state = $data['state'];
            $customerInfo->city = $data['govern'];
            $customerInfo->street = $data['street'];
            $customerInfo->email = $data['email'];
            $customerInfo->phone_no = $data['phone'];
            $customerInfo->alt_phone_no = $data['alt_phone'];
            $customerInfo->save();
            //save to packageDetail table using foreach
            foreach($data['desc'] as $key =>$val){
                if(!empty($val)){
                    $qty = $data['qty'][$key];
                    $price = $data['price'][$key];
                    $subtotal = $qty * $price;
                    $savePakage = new PackageDetail;
                    $savePakage->user_id = $user_id;
                    $savePakage->order_number = $data['order_number'];
                    $savePakage->description = $val;
                    $savePakage->unit_price = $price;
                    $savePakage->quantity = $qty;
                    $savePakage->total_price = $subtotal;
                    $savePakage->save();

                }
            }
            //email the order to the user
            $email= $data['email'];
            $orderPackage = PickUpDetail::where('order_number',  $data['order_number'])->first();
            $orderItems = PackageDetail::where('order_number',  $data['order_number'])->get();
            $customerDetails= CustomerInfo::where('order_number',  $data['order_number'])->first();
            $messageData = [
                    'email'=>$data['email'],
                    'name'=>$data['first_name'],
                    'order_id'=>$data['order_number'],
                    'orderDetails' => $orderItems,
                    'customerDetails' => $customerDetails,
                    'orderPackage' => $orderPackage
                ];
                Mail::send('emails.order', $messageData,function($message) use($email){
                    $message->to($email)->subject('Order Placed - online WanaBuy');
                });
               // alertify()->success('Order added successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','Order added successfully');
        }
        $meta_title= "Wanamove - Merchant - Add Order";
        $meta_description = "Merchant Order";
        $meta_keywords = "logistics website, ecommerce, Pickup";
        
        return view('merchants.new_order')->with(compact('meta_title', 'meta_description','meta_keywords'));
    }
    public function viewOrder(Request $request){
        $user_id = Auth::user()->id;
        if(Session::get('adminDetail')['admin'] == 1){
             $allPackage = PickUpDetail::paginate(10);
        }else{
            $allPackage = PickUpDetail::where('user_id',$user_id)->paginate(10);
        }
        $searchFilters= PickUpDetail::select('pickup_status')->groupBy('pickup_status')->get();
        $searchFilters = array_flatten(json_decode(json_encode($searchFilters), true));
        //echo "<pre>"; print_r($allPackage); die;
         $meta_title= "Wanamove - Merchant - View Order";
        $meta_description = "Merchant View Order";
        $meta_keywords = "logistics website, ecommerce, order";

        return view('merchants.view_order')->with(compact('allPackage', 'searchFilters','meta_title', 'meta_description','meta_keywords'));
    }
    public function viewOrderDetail($orderNo=null){
        $user_id = Auth::user()->id;
        if(Session::get('adminDetail')['admin'] == 1){
             $orderDetails = PickUpDetail::where(['order_number'=> $orderNo])->first();
            $orderDetails['customer']= CustomerInfo::where(['order_number'=>$orderNo])->first();
            $orderDetails['package']= PackageDetail::where(['order_number'=>$orderNo])->get();
        }else{
           $orderDetails = PickUpDetail::where(['order_number'=> $orderNo,'user_id'=>$user_id]);
           if($orderDetails->count() ==0){
            return redirect('/merchant/view-order')->with('error_message', 'Access Denied');
           }
           $orderDetails = $orderDetails->first();
           $orderDetails['customer']= CustomerInfo::where(['order_number'=>$orderNo,'user_id'=>$user_id])->first();
           $orderDetails['package']= PackageDetail::where(['order_number'=>$orderNo,'user_id'=>$user_id])->get();
    }
        $orderDetails= json_decode(json_encode($orderDetails));
        //echo "<pre>"; print_r($orderDetails); die;

         $meta_title= "Wanamove - Merchant - View Order";
        $meta_description = "Merchant View Order";
         return view('merchants.view_order_detail')->with(compact('orderDetails','meta_title', 'meta_description'));

    }
    public function orderStatusUpdate(Request $request, $orderNo=null){
        //echo Session::get('adminDetail')['admin']; die;
        if(Session::get('adminDetail')['admin'] == 0){
           // alertify()->error('Access Denied!')->position('bottom left')->delay(5000);
            return redirect('/merchant/dashboard')->with('error','Access Denied!');
        }
        $data= $request->all();
        PickUpDetail::where(['order_number'=> $orderNo])->update(['pickup_status'=>$data['updateStatus']]);
        //alertify()->success('Status Updated Successfully')->position('bottom left')->delay(5000);
        //echo 'upstae'; die;
        return redirect()->back()->with('success','Status updated successfully');
    }
    public function orderSearch(Request $request){
        if(empty($request->searchTxt)){
            return redirect('/merchant/view-order');
        }
        $searchFilters= PickUpDetail::select('pickup_status')->groupBy('pickup_status')->get();
        $searchFilters = array_flatten(json_decode(json_encode($searchFilters), true));
        $user_id = Auth::user()->id;
        $data = $request->all();
        $search = $data['searchTxt'];
        //$output = '';
        
        $allPackage = PickUpDetail::where(function($query) use($search){
           $query->where('order_number', 'LIKE', "%$search%")
                 ->orwhere('first_name', 'LIKE', "%$search%");
        });
        if(Session::get('adminDetail')['admin'] == 0){
           $allPackage= $allPackage->where('user_id',$user_id)->orderBy('created_at','Desc')->paginate(10);
        }else{
            $allPackage= $allPackage->orderBy('created_at','Desc')->paginate(10);
        }

         $meta_title= "Wanamove - Merchant - Order";
        $meta_description = "Merchant search Order";
        $meta_keywords = "logistics website, ecommerce, order, search";
        return view('merchants.view_order')->with(compact('allPackage', 'searchFilters','meta_title', 'meta_description','meta_keywords'));
    }
    public function searchFilter(Request $request){
         $searchFilters= PickUpDetail::select('pickup_status')->groupBy('pickup_status')->get();
        $searchFilters = array_flatten(json_decode(json_encode($searchFilters), true));
        $user_id = Auth::user()->id;
        $data = $request->all();
        $search = $data['statusFilter'];
        //echo "<pre>"; print_r($search); die;
         $allPackage = PickUpDetail::where(['pickup_status'=>$search]);
         if(Session::get('adminDetail')['admin'] == 0){
            $allPackage = $allPackage->where('user_id', $user_id)->paginate(10);
        }else{
            $allPackage = $allPackage->paginate(10);
        }
             //echo "<pre>"; print_r($allPackage); die;
        $meta_title= "Wanamove - Merchant - Order";
        $meta_description = "Merchant search Order";
        $meta_keywords = "logistics website, ecommerce, order, search";
          return view('merchants.view_order')->with(compact('allPackage', 'searchFilters','meta_title', 'meta_description','meta_keywords'));
    }
    public function logout(){
        Auth::logout();
        Session::forget('merchantSession');
        Session::forget('adminDetail');
        Session::flush();
        return redirect('/merchant')->with('success_message', 'Logged out Successfully.');

    }
}
