<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;

use App\Models\Doctor;
use Prophecy\Argument\Token\ApproximateValueToken;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $req)
    {
        $data = new Appointment;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->date = $req->date;
        $data->phone = $req->number;
        $data->message = $req->message;
        $data->doctor = $req->doctor;
        $data->status = "in progress";
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment request successfull,we will connet with you soon');
    }

    public function myappointment()
    {
        if (Auth::id()) {

            $userid=Auth::user()->id;
            $appoint=Appointment::where('user_id',$userid)->get();
            return view('user.myappointment',compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    public function cencel_appoint($id){
        $data=Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
