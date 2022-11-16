<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function addview(){
        if(Auth::id())
        {
            if(Auth::user()->usertype==1){

                return view('admin.add_doctor');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');

        }
    }
    public function upload(Request $req){
        $doctor= new Doctor();
        $image = $req->file;
        $imageName=time().'.'.$image->getClientoriginalExtension();
        $req->file->move('doctorImage',$imageName);
        $doctor->image=$imageName;

        $doctor->name=$req->name;
        $doctor->phone=$req->phone;
        $doctor->speciality=$req->speciality;
        $doctor->room=$req->room;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function showAppointment(){
        if(Auth::id())
        {
            if(Auth::user()->usertype==1){

                $data=Appointment::all();

                return view('admin.showAppointment',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');

        }

    }
    public function cancelAppointment($id){
        $data=Appointment::find($id);
        $data->status='cancelled';
        $data->save();
        return redirect()->back();
    }
    public function approveAppointment($id){
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function showDoctor(){

        if(Auth::id())
        {
            if(Auth::user()->usertype==1){

                $data=Doctor::all();
                return view('admin.showDoctor', compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');

        }

    }
    public function deleteDoctor($id){

        $data=Doctor::find($id);
        $data->delete();
        // $data->save();
        return redirect()->back();
    }

    public function updateDoctor($id){
        // $data=Doctor::all();

        if(Auth::id())
        {
            if(Auth::user()->usertype==1){

                $data=Doctor::find($id);
                return view('admin.updateDoctor',compact('data'));

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');

        }


    }


    public function editedDoctor(Request $req,$id){


        $doctor= doctor::find($id);
        $doctor->name=$req->name;
        $doctor->phone=$req->phone;
        $doctor->speciality=$req->speciality;
        $doctor->room=$req->room;
        $image = $req->file;
        if($image){
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $req->file->move('doctorImage',$imageName);
        $doctor->image=$imageName;
}
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }



}
