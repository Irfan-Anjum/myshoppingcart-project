<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //

    public function index()
    {

        return view('frontend.index');
    }

    public function UserLogout()
    {

        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user= User::find($id);

        return view('frontend.profile.user_profile',compact('user'));

    }

    public function UserProfileStore(Request $request)
    {
       $uid = Auth::user()->id;
        $userData = User::find($uid);


       // $userData = User::find(Auth::user()->id);

        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->phone = $request->phone;


        if($request->file('profile_photo_path')) // if condition
        {
            $file =  $request->file('profile_photo_path'); //file request assgin to variable 
            
           //unlink(public_path('upload/user_images/'.$userData->profile_photo_path)); //delte the previous picture

            $filename = date('YmdHi').$file->getClientOriginalName(); // concatnate date with extension and assgint to new variablef
            
            $file->move(public_path('upload/user_images'),$filename);// upload/move new file to folder

            $userData['profile_photo_path'] = $filename;


        }
        $userData->save();
        //Adding toaster functionality here

        $notificaton = array(

            
            'message' => 'User profile updated success',
            'alert-type'=>'success'


        );
        return redirect()->route('dashboard')->with($notificaton);


    } 

public function UserChangePassword()
{
    //THIS IS EQLIQOUNT ORM METHODLOGY, WE AER USING QUERLY BUILDER FOR THIS SPECIFC FUNCTION 
    //PLEASE CHECK BLADE.PHP PAGE 


    $id = Auth::user()->id;
    $user = User::find($id);
    return view('frontend.profile.change_password', compact('user'));
}


public function UserPasswordUpdate(Request $request)

{
     $validate = $request->validate([ 'oldpassword' => 'required', 
    'password' => 'required|confirmed',
    ]);

   $hashPassword = Auth::user()->password;

    if(Hash::check($request->oldpassword,$hashPassword)) 

   /*condition to check if this old password is matching with databased password */
    {
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();

        return redirect()->route('user.logout');

    }else{
      return redirect()->back();
    }

}

}
