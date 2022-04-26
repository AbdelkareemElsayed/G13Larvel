<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class studentController extends Controller
{
    //

    function  index(){

        $data =  student :: get();  // select * from users 
          
        return view('students.index',['data' => $data]);
    }



    function Create(){
        return view('students.create',['title' => "Create Student"]);
    }


    function Store(Request $request){
     // code ......

     $data = $this->validate($request,[
         "name"     => 'required',
         "password" => "required|min:6|max:10",
         "email"    => "required|email|unique:users",

     ]);

        $data['password'] = bcrypt($data['password']);

          $op =  student :: create($data);

          if($op){
              dd('Raw Inserted');
          }else{
              dd('Error Try Again');
          }

    }


}
