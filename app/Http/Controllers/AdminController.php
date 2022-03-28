<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    //
    public function add_doctor(){
        return view('admin.add_doctor');
    }
    public function upload_doctor(Request $req){
         $doctor=new Doctor;

         $image=$req->file; 
         $imagename=time().'.'.$image->getClientoriginalExtension();
         $req->file->move('doctorimage',$imagename);
         $doctor->image=$imagename;

         $doctor->name=$req->name;
         $doctor->email=$req->email;
         $doctor->phone=$req->phone;
         $doctor->speciality=$req->speciality;
         $doctor->save();
         return redirect()->back()->with('message','Doctor Added Successfully');

    }
}
