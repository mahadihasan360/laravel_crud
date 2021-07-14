<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class teachercontroller extends Controller
{
    /**
     * All teachers show
     */
    public function index(){
        $data = Teacher::all();
        return view("teacher.index",[
            "all_teacher"     => $data
        ]);
    }

    /**
     * Create teacher
     */
    public function create(){
        return view("teacher.create");
    }

    /**
     * Store teacher data
     */
    public function store(Request $request){

        $this -> validate($request,[
            "name"        => ["required"],
            "email"       => ["required","unique:teachers","email"],
            "cell"        => ["required","unique:teachers","numeric","starts_with:01,+8801"],
            "uname"       => ["required","unique:teachers","min:5"],
            "subject"       => ["required"],
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
            "subject.required" => "সাবজেক্ট এর ঘর খালি রাখা যাবে না ",
        ]);

        $unique_name = "";

        if($request -> hasFile("photo")){

            $img = $request -> file("photo");
            $unique_name = md5(time().rand()) . "." . $img -> getClientOriginalExtension();
            $img -> move(public_path("media/teachers") , $unique_name);
        }
        
        Teacher::create([

            "name"    => $request -> name,
            "email"   => $request -> email,
            "cell"    => $request -> cell,
            "uname"   => $request -> uname,
            "photo"   => $unique_name,
            "subject" => $request -> subject,

        ]);

        return back() -> with("success","Thanks " . $request -> name .  " For Your Registration");

    }

    /**
     * Show single teacher
     */
    public function show($id){
        $data = Teacher::find($id);
        return view("teacher.show",[
            "single_teacher"      => $data,
        ]);
    }

    /**
     * Edit teacher data
     */
    public function edit($id){

        $data = Teacher::find($id);
        return view("teacher.edit",[
            "edit_teacher"     => $data,
        ]);
    }

    /**
     * 
     */
    public function update(Request $request,$id){
        $update_data = Teacher::find($id);

        $update_data -> name = $request -> name;
        $update_data -> email = $request -> email;
        $update_data -> cell = $request -> cell;
        $update_data -> uname = $request -> uname;
        $update_data -> subject = $request -> subject;

        $update_data -> update();
        return back() -> with("success","Data Updated Successful");
    }

    /**
     * Destroy teacher
     */

    public function destroy($id){

        $data = Teacher::find($id);
        $data -> delete();
        return back() -> with("success","Data Deleted Successful");

    }

    
}
