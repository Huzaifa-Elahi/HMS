<?php

namespace App\Http\Controllers;

use App\models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function redirect(){
        if(Auth::id()){
            // compact is used to send data
            if(Auth::user()->usertype=='0'){
                $doctor =Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');

            }
        }
        else{
            return redirect()->back();
        }
    }
    public function index(){
        // since chnage in url was takig us back to user withouit loging in we made this function to verify that
        if(Auth::id()){
            // compact is used to send data
            if(Auth::user()->usertype=='1'){
                return redirect('/home');
            }
            else{
                $doctor =Doctor::all();
                return view('user.home',compact('doctor'));

            }
        }
        else{

            $doctor =Doctor::all();
            return view('user.home',compact('doctor'));
        }
    }
    public function about(){
        if(Auth::id()){
            // compact is used to send data
            if(Auth::user()->usertype=='1'){
               return redirect('/home');
            }
            else{
                $doctor =Doctor::all();
                return view('user.about',compact('doctor'));

            }
        }
        else{

            $doctor =Doctor::all();
            return view('user.about',compact('doctor'));
        }
    }
    public function news(){
        if(Auth::id()){
            // compact is used to send data
            if(Auth::user()->usertype=='1'){
               return redirect('/home');
            }
            else{
                $doctor =Doctor::all();
                return view('user.news',compact('doctor'));

            }
        }
        else{

            $doctor =Doctor::all();
            return view('user.news',compact('doctor'));
        }
    }
    public function doctorview(){
        if(Auth::id()){
            // compact is used to send data
            if(Auth::user()->usertype=='1'){
               return redirect('/home');
            }
            else{
                $doctor =Doctor::all();
                return view('user.doctorview',compact('doctor'));

            }
        }
        else{

            $doctor =Doctor::all();
            return view('user.doctorview',compact('doctor'));
        }
    }
    public function appointmentview(){
        if(Auth::id()){
            // compact is used to send data
            if(Auth::user()->usertype=='1'){
                return redirect('/home');
            }
            else{
                $doctor =Doctor::all();
                return view('user.appointmentview',compact('doctor'));

            }
        }
        else{

            $doctor =Doctor::all();
            return view('user.appointmentview',compact('doctor'));
        }
    }

    public function appointment(Request $req){
        $data= new Appointment();
        // $image = $req->file;
        // $imageName=time().'.'.$image->getClientoriginalExtension();
        // $req->file->move('dataImage',$imageName);
        // $data->image=$imageName;

        $data->name=$req->name;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->doctor=$req->doctor;
        $data->date=$req->date;
        $data->message=$req->message;
        $data->status='In progress';
        if(Auth::id()){

            $data->user_id=Auth::user()->id;

        }


        $data->save();
        return back()->with('message', 'Appointment Registered Successfully');
    }
    public function myappointment(){
        if(Auth::id()){

            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));
            // return view('user.my_appointment');
        }
        else{
            return redirect()->back();
        }
    }
    public function cancel_appointment($id){
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
