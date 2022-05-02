<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //
    // public function adminHome()
    // {
    //     if(Auth::id()){
    //         if(Auth::user()->usertype==1){
    //          return view('admin.showappointment');
    //         }else{
    //             return redirect()->back();
    //         }
    //      }else{
    //          return redirect('login');
    //      }    
    // }
    public function add_doctor(){
        if(Auth::id()){
           if(Auth::user()->usertype==1){
            return view('admin.add_doctor');
           }else{
               return redirect()->back();
           }
        }else{
            return redirect('login');
        }    
       
    }
    public function upload_doctor(Request $req){
         $doctor=new Doctor;

         $image=$req->file; 
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $req->file->move('doctorimage',$imagename);
         $doctor->image=$imagename;

         $doctor->name=$req->name;
         $doctor->email=$req->email;
         $doctor->phone=$req->phone;
         $doctor->speciality=$req->speciality;
         $doctor->save();
         return redirect()->back()->with('message','Doctor Added Successfully');

    }

    public function showappointment(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Appointment::all();
                return view('admin.showappointment',compact('data'));
            }else{
                return redirect()->back();
            }
         }else{
             return redirect('login');
         }  
       
    }

    public function approved($id){
        $data=Appointment::find($id);
        $data->status="approved";
        $data->save();
        return redirect()->back(); 
    }
    public function cenceled($id){
        $data=Appointment::find($id);
        $data->status="cenceled";
        $data->save();
        return redirect()->back(); 
    }

    public function showdoctor(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Doctor::all();
                return view('admin.showdoctor',['data'=>$data]);
            }else{
                return redirect()->back();
            }
         }else{
             return redirect('login');
         }    
       
    }

    public function delete($id){
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update($id){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Doctor::find($id);
                return view('admin.updatedoctor',compact('data'));
            }else{
                return redirect()->back();
            }
         }else{
             return redirect('login');
         }    
        
    }


    public function edit(Request $req){
        $doctor=Doctor::find($req->id);

         $image=$req->file; 
         if($image){
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $req->file->move('doctorimage',$imagename);
         $doctor->image=$imagename;
         }
         $doctor->name=$req->name;
         $doctor->email=$req->email;
         $doctor->phone=$req->phone;
         $doctor->speciality=$req->speciality;
         $doctor->save();
         return redirect()->back()->with('message','Doctor data Updated Successfully');
    }

    public function email($id){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Appointment::find($id);
                return view('admin.email_view',compact('data'));
            }else{
                return redirect()->back();
            }
         }else{
             return redirect('login');
         }   
       
    }
    public function sendMail(Request $req,$id){
        $data=Appointment::find($id);
        $details = [
             "greeting" => $req->greeting,
             "body" => $req->body,
             "actiontext" => $req->actiontext,
             "actionurl" => $req->actionurl,
             "endpart" => $req->endpart,

        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','email sent successfully');
    }
}
