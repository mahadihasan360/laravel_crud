<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;

class guardiancontroller extends Controller
{
    /**
     * All guardian show
     */
    public function index(){
        $guardian = Guardian::all();
        return view("guardian.index",[
            "guardian"  => $guardian
        ]);
    }

    /**
     * Create guardian
     */
    public function create(){
        return view("guardian.create");
    }

    /**
     * Store guardian
     */
    public function store(Request $request){

        $unique_name = "";
        if($request -> hasFile("photo")){

            $img = $request -> file("photo");
            $unique_name = md5(time().rand()) . "." . $img -> getClientOriginalExtension();
            $img -> move(public_path("media/guardians/") , $unique_name);

        }
        

        Guardian::create([

            "name"        => $request -> name,
            "email"       => $request -> email,
            "cell"        => $request -> cell,
            "uname"       => $request -> uname,
            "location"    => $request -> location,
            "photo"       => $unique_name,
        
        ]);

        return back() -> with("success","Registration Successful!");
        
    }

    /**
     * Destroy guardian
     */
    public function destroy($id){
        $destroy_data = Guardian::find($id);
        $unique_name = $destroy_data -> photo;
        if(file_exists($unique_name)){
            unlink("media/guardians/".$unique_name);
        }
        $destroy_data -> delete();
        return back() -> with("success","Data Deleted Successful!");
    }




}
