<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function AllAdminRole(){
        $adminuser = User::where('type', 2)->latest()->get();
        return view('admin.role.all_adminuser', compact('adminuser'));
    } //end method


    public function AddAdminRole(){
        return view('admin.role.add_adminuser');
    } //end method

    public function StoreAdminRole(Request $request){

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'username' => 'required|unique:users',
            'profile_image' => 'required',
        ]);



        $image = $request->file('profile_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/adminuser/'.$name_gen);
        $save_url = 'upload/adminuser/'.$name_gen;

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'username' => $request->username,
                       
            'm_suppliers' => $request->m_suppliers,
            'm_customers' => $request->m_customers,
            'm_units' => $request->m_units,
            'm_categories' => $request->m_categories,
            'm_products' => $request->m_products,
            'm_purchases' => $request->m_purchases,
            'm_invoices' => $request->m_invoices,
            'm_stocks' => $request->m_stocks,
            'm_access' => $request->m_access,

            'profile_image' => $save_url,
            'created_at' => Carbon::now(),
            'type' => 2,

        ]);

        $notification = array(
            'message' => 'Admin User Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('admin.user.all')->with($notification);

    } //end method

    public function AdminUserEdit($id){
        $adminuser = User::find($id);
        return view('admin.role.edit_adminuser', compact('adminuser'));
    } //end method

    public function AdminUserUpdate(Request $request){
        $id = $request->id;
        $old_image = $request->old_image;

        
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/adminuser/'.$name_gen);
            $save_url = 'upload/adminuser/'.$name_gen;

            unlink($old_image);
            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,

                'm_suppliers' => $request->m_suppliers,
                'm_customers' => $request->m_customers,
                'm_units' => $request->m_units,
                'm_categories' => $request->m_categories,
                'm_products' => $request->m_products,
                'm_purchases' => $request->m_purchases,
                'm_invoices' => $request->m_invoices,
                'm_stocks' => $request->m_stocks,
                'm_access' => $request->m_access,
    
                'profile_image' => $save_url,
                'created_at' => Carbon::now(),
                'type' => 2,
    
            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'success'
            );
    
            return Redirect()->route('admin.user.all')->with($notification);

        }else{
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,

                'm_suppliers' => $request->m_suppliers,
                'm_customers' => $request->m_customers,
                'm_units' => $request->m_units,
                'm_categories' => $request->m_categories,
                'm_products' => $request->m_products,
                'm_purchases' => $request->m_purchases,
                'm_invoices' => $request->m_invoices,
                'm_stocks' => $request->m_stocks,
                'm_access' => $request->m_access,

                'created_at' => Carbon::now(),
                'type' => 2,

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('admin.user.all')->with($notification);
        }


    } //end method


    public function AdminUserDelete($id){
        $image = User::find($id);
        $old_image = $image->profile_image;
        unlink($old_image);
        User::find($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    } //end method


}
