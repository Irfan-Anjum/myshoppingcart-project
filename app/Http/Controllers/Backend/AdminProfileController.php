<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //

    public function AdminProfile()
    {

       // $adminData = Admin::findOrFail()->get()->latest();
    
        $adminData = Admin::find(1); //to get the one id data

        return view('admin.admin_profile_view',compact ('adminData'));
    }


    public function AdminProfileEdit()
    {

        $adminEdit = Admin::find(1); //to get the one id data

        return view('admin.admin_edit_profile',compact ('adminEdit'));
    }


    public function AdminProfileStore(Request $request)
    {

        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        

        if($request->file('ProfilePhoto'))
        {

            $file = $request->file('ProfilePhoto');

            // For deleting the previous one from directory. 

            unlink(public_path('upload/admin_images/'.$data->profile_photo_path));

            $filename = date('YmdHi').$file->getClientOriginalName();
            
            $file->move(public_path('upload/admin_images'),$filename);

            $data['profile_photo_path'] = $filename;

        }
        $data->save();

        //Adding toaster functionality here

        $notificaton = array(

            
            'message' => 'Admin profile updated success',
            'alert-type'=>'success'


        );
        return redirect()->route('admin.profile')->with($notificaton);



    }    //end method

    //Admin Change Password

    public function AdminChangePassword()
    {

        $adminPass = Admin::find(1);
        return view('admin.admin_change_password',compact('adminPass'));
    }


    public function AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([

            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashPassword = Admin::find(1)->password;

        
        if(Hash::check($request->oldpassword,$hashPassword)) 

       /*condition to check if this old password is matching with databased password */
        {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            return redirect()->route('admin.logout');

        }else{

            return redirect()->back();

        }
        }
}
