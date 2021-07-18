<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentcontroller extends Controller
{
    /**
     * All student show
     */
    public function index(){
        $data = Student::all();
        return view("student.index",[

            "all_data"    => $data
        ]);
    }

    /**
     * student create
     */
    public function create(){
        return view("student.create");
    }

        /**
     * store data
     */
    public function store(Request $request){

        $this -> validate($request,[
            "name"    => ["required"],
            "email"   => ["required","unique:students","email"],
            "cell"    => ["required","unique:students","numeric","starts_with:01,+8801"],
            "uname"   => ["required","unique:students","min:5"],
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
            $img -> move(public_path("media/students") , $unique_name);

        }

        Student::create([
            "name"      => $request -> name,
            "email"     => $request -> email,
            "cell"      => $request -> cell,
            "uname"     => $request -> uname,
            "photo"     => $unique_name,
        ]);

        return back() -> with("success","Thanks " . $request -> name . " For Your Registration" );
    }

    /**
     * show single student
     */
    public function show($id){
        $data = Student::find($id);
        return view("student.show",[
            "student_data"    => $data,
        ]);
    }

    /**
     * edit student
     */
    public function edit($id){
        $data = Student::find($id);
        return view("student.edit",[
            "edit_data"     => $data,
        ]);
    }

    /**
     * update student
     */
    public function update(Request $request,$id){


        $update_data = Student::find($id);



        $unique_name = $update_data -> photo;

        if($request -> hasFile("photo")){

            unlink("media/students/" . $unique_name);

            $img = $request -> file("photo");
            $unique_name = md5(time().rand()) . "." . $img -> getClientOriginalExtension();
            $img -> move(public_path("media/students") , $unique_name);

        }



        $update_data -> name  = $request -> name;
        $update_data -> email = $request -> email;
        $update_data -> cell  = $request -> cell;
        $update_data -> uname = $request -> uname;
        $update_data -> photo = $unique_name;
        $update_data -> update();
        return back() -> with("success","Student Data Update Successful" );
        
    }

    /**
     * destroy student
     */
    public function destroy($id){
        $delete_data = Student::find($id);
        $unique_name = $delete_data -> photo;
        if(file_exists($unique_name)){
            unlink("media/students/" . $unique_name);
        }
        $delete_data -> delete();
        return back() -> with("success","Student Data Deleted Successful" );
    }
}
