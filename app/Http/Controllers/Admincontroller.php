<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;




class Admincontroller extends Controller
{
    
     public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/login');
   

    } //end method


    public function AdminLogin(Request $request){
       
        $credentials = $request->only('email' , 'password');

        if(Auth::attempt($credentials)){
           $user = Auth::user();
         
           $verificationCode = random_int(100000 , 999999);
           session(['verification_code' =>   $verificationCode , 'user_id' => $user->id]);
           Mail::to($user->email)->send(new VerificationCodeMail( $verificationCode ));

           Auth::logout();

           return redirect()->route('custom.verification.form')->with('status' , 'کد به ایمیل ارسال شد ' );
        }
      
        return redirect()->back()->withErrors(['email' => 'مشخات وارد شده اشتباه است ']);

    } //end method




    public function ShowVerification(){
        return view('auth.verify');
    } //end method

    

public function VerificationVerify(Request $request){
       
   $request->validate(['code' => 'required|numeric']);

   if($request->code == session('verification_code')){
    Auth::loginUsingId(session('user_id'));

    session()->forget(['verification_code', 'user_id']);
    return redirect()->intended('/dashboard');

   }

   
   return back()->withErrors(['code' => 'کد نامعتبر است ']);

}//end method





public function AdminProfile(){
    $id = Auth::user()->id;
    $profiledata = User::find($id);
    return view('admin.admin_profile' , compact('profiledata'));
}//end method


public function ProfileStore(Request $request)
{
    $id = Auth::user()->id;
    $data = User::find($id);

    // اعتبارسنجی داده‌ها
    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // فقط عکس تا 2MB
    ]);

    // آپدیت فقط فیلدهایی که مقدار دارند
    if ($request->filled('name')) {
        $data->name = $request->name;
    }

    if ($request->filled('email')) {
        $data->email = $request->email;
    }

    if ($request->filled('phone')) {
        $data->phone = $request->phone;
    }

    if ($request->filled('address')) {
        $data->address = $request->address;
    }

    $oldPhoto = $data->photo;

    // آپلود عکس جدید
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/user_images'), $fileName);
        $data->photo = $fileName;

        // حذف عکس قدیمی
        if ($oldPhoto && $oldPhoto !== $fileName) {
            $oldFilePath = public_path('upload/user_images/' . $oldPhoto);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
    }

    // ذخیره تغییرات
    $data->save();
    return redirect()->back();

}//end method


}
