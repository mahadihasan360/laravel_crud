<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class staffcontroller extends Controller
{
    /**
     * All staff show
     */
    public function index(){
        $data = Staff::all();
        return view("staff.index",[

            "all_staff"     => $data

        ]);
    }

    /**
     * Create staff
     */
    public function create(){
        return view("staff.create");
    }

    /**
     * Store staff
     */
    public function store(Request $request){

        $this -> validate($request,[
            "name"             => ["required"],
            "email"            => ["required","unique:staff","email"],
            "cell"             => ["required","unique:staff","numeric","starts_with:01,+8801"],
            "uname"            => ["required","unique:staff","min:5"],
        ],[
            "name.required"    => "নামের ঘর খালি রাখা যাবে না",
            "email.required"   => "ইমেইল এর ঘর খালি রাখা যাবে না",
            "email.unique"     => "এই ইমেইল দিয়ে ইতিমধ্যে সাইনআপ করা হয়ে গেছে",
            "email.email"      => "সঠিক ইমেইল ব্যাবহার করুন",
            "cell.required"    => "ফোন নাম্বারের ঘরটি খালি রাখা যাবে না",
            "cell.numeric"     => "ফোন নাম্বারটি অবশ্যই সঠিক হতে হবে",
            "cell.starts_with" => "ফোন নাম্বারটি অবশ্যই ০১/+৮৮০১ দিয়ে শুরু করতে হবে",
            "uname.required"   => "ইউজার নামের ঘর খালি রাখা যাবে না",
            "uname.unique"     => "এই ইউজার নেম দিয়ে ইতিমধ্যে সাইনআপ করা হয়ে গেছে",
            "uname.min"        => "ইউজার নেম কমপক্ষে ৫ অক্ষরের হতে হবে",
        ]);

        $unique_name = "";

        if($request -> hasFile("photo")){

            $img = $request -> file("photo");
            $unique_name = md5(time().rand()) . "." . $img -> getClientOriginalExtension();
            $img -> move(public_path("media/staff/"),$unique_name);

        }

        Staff::create([

            "name"     => $request -> name,
            "email"     => $request -> email,
            "cell"     => $request -> cell,
            "uname"     => $request -> uname,
            "photo"     => $unique_name,

        ]);
        return back() -> with("success","Thanks " . $request -> name . " For Your Registration");
        
    }

    /**
     * Show single staff
     */
    public function show($id){
        $data = Staff::find($id);
        return view("staff.show",[

            "single_staff"     => $data,

        ]);
    }

    /**
     * Edit staff
     */
    public function edit($id){
        $data = Staff::find($id);
        return view("staff.edit",[

            "edit_data"     => $data,

        ]);
    }

    /**
     * Update staff
     */
    public function update(Request $request,$id){
        $update_data = Staff::find($id);

        $unique_name = $update_data -> photo;

        if($request -> hasFile("photo")){

            unlink("media/staff/" . $unique_name);

            $img = $request -> file("photo");
            $unique_name = md5(time().rand()) . "." . $img -> getClientOriginalExtension();
            $img -> move(public_path("media/staff/"),$unique_name);

        }

        $update_data -> name  = $request -> name;
        $update_data -> email  = $request -> email;
        $update_data -> cell  = $request -> cell;
        $update_data -> uname  = $request -> uname;
        $update_data -> photo  = $unique_name;

        $update_data -> update();

        return back() -> with("success", $update_data -> name . " Your Data Update Successful");
    }

    /**
     * Delete staff
     */
    public function destroy($id){

        $destroy_data = Staff::find($id);

        $unique_name = $destroy_data-> photo;
        if(file_exists($unique_name)){
            unlink("media/staff/" . $unique_name);
        }

        $destroy_data -> delete();
        return back() -> with("success", $destroy_data -> name . " Your Data Deleted Successful");
    }


}
