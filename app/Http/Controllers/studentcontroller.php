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
        $update_data -> name  = $request -> name;
        $update_data -> email = $request -> email;
        $update_data -> cell  = $request -> cell;
        $update_data -> uname = $request -> uname;
        $update_data -> update();
        return back() -> with("success","Student Data Update Successful" );
        
    }

    /**
     * destroy student
     */
    public function destroy($id){
        $delete_data = Student::find($id);
        $delete_data -> delete();
        return back() -> with("success","Student Data Deleted Successful" );
    }
}
