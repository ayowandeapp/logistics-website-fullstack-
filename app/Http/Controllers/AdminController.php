<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
use App\UserDetail;
use App\PickUpDetail;
use App\CustomerInfo;
use App\PackageDetail;
use App\Service;
use App\About;
use App\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
	//merchant login
    public function login(Request $request){
        if (Session::has('merchantSession')) {
            return redirect('/merchant/dashboard');
        }
        if($request->isMethod('post')){
            $request->validate([
                'email'=>'required|email|max:255',
                'password'=>'required']);
             $data =$request->all();
             $user= User::where(['email'=>$data['email']])->first();
             //echo $user; die;
             if(empty($user)){
                return redirect('/merchant')->with('error_message', 'Invalid email or password.Try Again');
             }
            if($user->status == 0){
                 return redirect()->back()->with('error_message','Your account is not Activated. Please confirm your email to Activate');
            }
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'merchant'=> '1'])){
                Session::put('merchantSession',$data['email'] );
                //put details in session
                //Session::put('adminDetail', $user);
                return redirect('/merchant/dashboard');
            }else{
                return redirect('/merchant')->with('error_message', 'Invalid email or password.Try Again');
            }
        }
        return view('merchants.login');
    }
    public function forgotPassword(Request $request){
        if (Session::has('merchantSession')) {
            return redirect('/merchant/dashboard');
        }

        if($request->isMethod('post')){
                $request->validate([
                'email'=>'required|email|max:255']);
                $email =$request->email;
                $user= User::where('email', $email);
                if($user->count() == 0){
                    return redirect()->back()->with('error_message', 'Invalid Email , Kindly SignUp');
                }else{
                    $user=$user->first();
                    //send an email
                     //create password token
                        DB::table('password_resets')->insert([
                            'email' =>$email,
                            'token' =>str_random(60),
                            'created_at' => Carbon::now()
                        ]);
                        //get the token created above
                        $token = DB::table('password_resets')->where('email', $email)->first();
                        $email = $token->email;
                        $name= $user->name;
                        $token= $token->token;
                        $messageData = ['email'=>$email, 'name'=>$name,'token'=>$token];
                        Mail::send('emails.reset_password', $messageData,function($message) use($email){
                            $message->to($email)->subject('WannaMove Reset Your Password');
                        });
                    return redirect()->back()->with('success_message', 'instructions has been sent to you!');
                }
        }
        return view('merchants.password_recover');
    }
    public function ResetPassword(Request $request, $token=null){
        if (Session::has('merchantSession')) {
            return redirect('/merchant/dashboard');
        }
        if($request->isMethod('post')){
            $data= $request->all();
            $request->validate([
                'resetPassword' => 'required|min:6|confirmed'
            ]);
            //echo "<pre>"; print_r($token); die;
            $tokenDetail = DB::table('password_resets')->where(['token'=> $token])->first();
            //echo "<pre>"; print_r($tokenDetail); die;
            $user = User::where('email', $tokenDetail->email);
            if($user->count() == 0){
                return redirect('/user-recover-password')->with('error_message', 'Email does not exist');
            }
            User::where('email', $tokenDetail->email)->update(['password'=>bcrypt($data['resetPassword'])]);
            $user= $user->first();
            $email = $tokenDetail->email;
            $name = $user->name;

            DB::table('password_resets')->where('email', $email)->delete();
            $messageData = ['email'=>$email, 'name'=>$name];
            Mail::send('emails.reset_success', $messageData,function($message) use($email){
                $message->to($email)->subject('WannaMove Reset Your Password');
            });
            return redirect('/merchant')->with('success_message', 'Password Reset, Kindly login in');
        }
        //echo "<pre>"; print_r($token); die;
        $tokenCount =DB::table('password_resets')->where('token', $token)->count();
        if($tokenCount == 0){
            return redirect('/merchant');
        }
        return view('merchants.reset_password')->with(compact('token'));
    }
    
    //merchant register
    public function register(Request $request){
        if (Session::has('merchantSession')) {
            return redirect('/merchant/dashboard');
        }
        if($request->isMethod('post')){
            $request->validate([
                'first_name'=>'required|max:255',
                'last_name'=>'required|max:255',
                'email'=>'required|email|max:255|unique:users',
                'password'=>'required|confirmed|min:6']);
            $data =$request->all();
            $register = new User;
            $register->name = $data['first_name'];
            $register->email = $data['email'];
            $register->password = bcrypt($data['password']);
            $register->merchant = 1;
            $register->save();
            //Auth::login($register);
            if($register->save()){
                $user= User::where('email',$data['email'])->first();
                $userDetail = new UserDetail;
                $userDetail->user_id = $user->id;
                $userDetail->first_name = $data['first_name'];
                $userDetail->last_name = $data['last_name'];
                $userDetail->country = '';
                $userDetail->state = '';
                $userDetail->city = '';
                $userDetail->gender = '';
                $userDetail->dob = '';
                $userDetail->about_myself = '';
                $userDetail->save();
            }
             $email = $data['email'];
            $messageData = ['email'=>$data['email'], 'name'=>$data['first_name'],'code'=>base64_encode($data['email'])];
            Mail::send('emails.confirmation', $messageData,function($message) use($email){
                $message->to($email)->subject('Confirm your WanaBuy email');
            });
            return redirect('/merchant')->with('success_message', 'Confirmation Message sent to your Email');            
        }
        return view('merchants.register');
    }
     public function confirmEmail($code = null){
        $email= base64_decode($code);
        $user = User::where('email',$email);
        if($user->count() >0){
            $userDetail = $user->first();
            if($userDetail->status == 1){
                return redirect('/merchant')->with('error_message','Account as already been Activated. Kindly Login');
            }else{
                $user->update(['status'=>1]);
                //send welcome email
                $messageData = ['email'=>$email, 'name'=>$userDetail->first_name];
                Mail::send('emails.welcome', $messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to WanaBuy');
                });
                return redirect('/merchant')->with('success_message','Account as been Activated. Kindly Login');
            }

        }else{
            abort(404);
        }
    }
    public function viewMerchant(){
        if(Session::get('adminDetail')['admin'] == 0){
            return redirect('/merchant/pickup');
        }
    	$allMerchant = User::with('userDetail')->get();
    	//echo "<pre>"; print_r($allMerchant); die;
    	return view('merchants.view_merchant')->with(compact('allMerchant'));
    }
    public function changeStatus($id=null){
    	$user = User::where('id',$id);
    	if($user->count() ==0){
    		return redirect()->back()->with('error_message', 'Oops! Merchant does not Exist');
    	}
    	$getUser= $user->first();
    	if($getUser->merchant ==0){
    		$user->update(['merchant'=>1]);

    	}else{
    		$user->update(['merchant'=>0]);
    	}  
        //alertify()->success('Merchant Status Changed')->position('bottom left')->delay(5000);
    	return redirect()->back()->with('success','Merchant Status Changed');  	

    }
     public function changeAdminStatus($id=null){
        //echo Session::get('adminDetail')['admin']; die;
        if(Session::get('adminDetail')['admin'] == 0){
            return redirect('/merchant/dashboard')->with('error_message','Access Denied!');
        }
        $user = User::where('id',$id);
        if($user->count() ==0){
            return redirect()->back()->with('error_message', 'Oops! Merchant does not Exist');
        }
        $getUser= $user->first();
        if($getUser->admin ==0){
            $user->update(['admin'=>1]);

        }else{
            $user->update(['admin'=>0]);

        }  
        //alertify()->success('Merchant Status Changed')->position('bottom left')->delay(5000);
        return redirect()->back()->with('success','Merchant Status Changed');      

    }
    public function ourServices(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'icon'=>'required|max:255',
                'title'=>'required|max:255',
                'detail'=>'required']);
            $service = new Service;
            $service->icon = $request->icon;
            $service->title = $request->title;
            $service->detail = $request->detail;
            $service->save();
            //alertify()->success('NEW service added successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','NEW service added successfully');

        }
        $services = Service::get();
        return view('admin.our_services')->with(compact('services'));
    }
    public function deleteService(Request $request){
        Service::where('id', $request->Id)->delete();
        echo "true";
    }
    public function editServices(Request $request, $id=null){
        Service::where('id', $id)->update(['icon'=> $request->icon, 'title'=>$request->title, 'detail'=>$request->detail]);
        //alertify()->success('Services updated successfully')->position('bottom left')->delay(5000);
        return redirect()->back()->with('success','Services updated successfully');
    }
    public function aboutUs(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'image'=>'required',
                'title'=>'required|max:255',
                'detail'=>'required']);

            if($request->hasFile('image')){

            $image = $request->file('image');

            $filename = 'about_'.time().'.'.$image->getClientOriginalExtension();
            //echo $filename; die;
            $destinationPath = public_path('/images/backend_images/about');
            Image::make($image)->resize(380,270)->save($destinationPath. '/'.$filename);
        }//echo $filename; die;
            $service = new About;
            $service->image = $filename;
            $service->title = $request->title;
            $service->detail = $request->detail;
            $service->save();
            //alertify()->success('Added successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','Added successfully');

        }
        $services = About::get();
        return view('admin.about_us')->with(compact('services'));
    }
    public function deleteAbout(Request $request){
        About::where('id', $request->Id)->delete();
        echo "true";
    }
    public function editAbout(Request $request, $id=null){
        $request->validate([
                'edittitle'=>'required|max:255',
                'editdetail'=>'required']);

            if($request->hasFile('editimage')){

            $image = $request->file('editimage');

            $filename = 'about_'.time().'.'.$image->getClientOriginalExtension();
            //echo $filename; die;
            $destinationPath = public_path('/images/backend_images/about');
            Image::make($image)->resize(380,270)->save($destinationPath. '/'.$filename);
            $abtImg= About::where('id', $id)->first();
            $large_path = 'images/backend_images/about/';
            if(file_exists($large_path.$abtImg->image)){
            unlink($large_path.$abtImg->image);
        }
            //echo $filename; die;
        }else{
            $filename = $request->current_image;

        }
        $abt = About::where('id', $id)->first();
        File::delete('/images/backend_images/about/'.$abt->image);
        About::where('id', $id)->update(['image'=> $filename, 'title'=>$request->edittitle, 'detail'=>$request->editdetail]);
        //alertify()->success('Updated successfully')->position('bottom left')->delay(5000);
        return redirect()->back()->with('success','Updated successfully');
    }
    public function viewLogo(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'image'=>'required',
                'title'=>'required',
                'keywords'=>'required',
                'description'=>'required']);

            if($request->hasFile('image')){

            $image = $request->file('image');

            $filename = 'logo_'.time().'.'.$image->getClientOriginalExtension();
            //echo $filename; die;
            $destinationPath = public_path('/images/frontend_images/');
            Image::make($image)->resize(58,55)->save($destinationPath. '/'.$filename);
        }//echo $filename; die;
            $service = new GeneralSetting;
            $service->image = $filename;
            $service->meta_title = $request->title;
            $service->meta_keywords = $request->keywords;
            $service->meta_description = $request->description;
            $service->save();
            //alertify()->success('Added successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','Added successfully');
        }
        $services = GeneralSetting::get();
        return view('admin.setting')->with(compact('services'));
    }
    public function editLogo(Request $request, $id=null){
        $request->validate([
                'title'=>'required|max:255',
                'keywords'=>'required',
                'description'=>'required']);

            if($request->hasFile('editimage')){

            $image = $request->file('editimage');

            $filename = 'logo'.time().'.'.$image->getClientOriginalExtension();
            //echo $filename; die;
            $destinationPath = public_path('/images/frontend_images');
            Image::make($image)->resize(58,55)->save($destinationPath. '/'.$filename);
            $abtImg= GeneralSetting::where('id', $id)->first();
            $large_path = 'images/frontend_images/';
            if(file_exists($large_path.$abtImg->image)){
            unlink($large_path.$abtImg->image);
        }
            //echo $filename; die;
        }else{
            $filename = $request->current_image;

        }
        GeneralSetting::where('id', $id)->update(['image'=> $filename, 'meta_title'=>$request->title, 'meta_keywords'=>$request->keywords, 'meta_description'=>$request->description]);
        //alertify()->success('Updated successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','Updated successfully');
    }
    public function viewfooter(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'title'=>'required|max:255']);
            DB::insert('insert into footers (title) values (?)',[$request->title]);
            //alertify()->success('Footer title added successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','Footer title added successfully');

        }
        $services = DB::table('footers')->get();
        return view('admin.footer')->with(compact('services'));
    }
    public function editFooter(Request $request, $id=null){
        $request->validate([
                'title'=>'required|max:255']);
        DB::table('footers')->where('id', $id)->update(['title' => $request->title]);
        //alertify()->success('Footer updated successfully')->position('bottom left')->delay(5000);
            return redirect()->back()->with('success','Footer updated successfully');
    }
}
