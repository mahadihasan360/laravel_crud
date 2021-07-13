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
