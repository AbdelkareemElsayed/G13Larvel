<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class studentController extends Controller
{
    //

    function  index()
    {


         $data =  student::get();  // select * from users

        return view('students.index', ['data' => $data]);

    }



    function Create()
    {
        return view('students.create', ['title' => "Create Student"]);
    }


    function Store(Request $request)
    {
        // code ......

        $data = $this->validate($request, [
            "name"     => 'required',
            "password" => "required|min:6|max:10",
            "email"    => "required|email|unique:users",
            "image"    => "required|image|mimes:png,jpg"
        ]);

        # Rename Image ....
        $FinalName = uniqid() . '.' . $request->image->extension();

        if ($request->image->move(public_path('/stdImages'), $FinalName)) {
            $data['image'] = $FinalName;
        }



        $data['password'] = bcrypt($data['password']);

        $op =  student::create($data);

        if ($op) {
            $message = 'Raw Inserted';
        } else {
           $message = 'Error Try Again';
        }
        # Set Message Session ....
        session()->flash('Message',$message);

        return redirect(url('/Student'));

    }


    #############################################################################################################################

    function edit($id)
    {

        $title = "Edit Account";

        # Fetch Raw Data ...
        //    $data =  student :: where('id',$id)->get();     // $data[0]->name
        $data =  student::find($id);

        return view('students.edit', ['title' => $title, 'data' => $data]);
    }

    #############################################################################################################################

    function update(Request $request, $id)
    {
        // code .....

        $data = $this->validate($request, [
            "name"     => 'required',
            "email"    => "required|email|unique:users,email," . $id,
            "image"    => "nullable|image|mimes:png,jpg"
        ]);


        # Fetch Raw Data ...
        $rawData = student::find($id);

        if ($request->hasFile('image')) {
            # Rename Image ....
            $FinalName = uniqid() . '.' . $request->image->extension();

            if ($request->image->move(public_path('/stdImages'), $FinalName)) {
                $data['image'] = $FinalName;

                unlink(public_path('stdImages/' . $rawData->image));
            }
        } else {
            $data['image'] = $rawData->image;
        }


        // update users ste name = $name , email = $email where id = $id

        $op =  student::where('id', $id)->update($data);

        if ($op) {
            $message = 'Raw Updated';
        } else {
            $message = "Error try again";
        }

     # Set Message Session ....
     session()->flash('Message',$message);

     return redirect(url('/Student'));


    }

#############################################################################################################################

    function destroy($id)
    {
        // code ....

        # Fetch RaW Data
        $raw = student::find($id);

        # Delete Raw ....
        $op =   student::where('id', $id)->delete(); // delete from users where id = $id

        if ($op) {

            unlink(public_path('stdImages/' . $raw->image));

            $message = 'Raw Deleted';
        } else {
            $message = 'Error Try Again';
        }

             # Set Message Session ....
             session()->flash('Message',$message);

             return redirect(url('/Student'));
    }
#############################################################################################################################

function login(){

    return view('Students.login',['title' => "Login Page"]);

}

#############################################################################################################################

function DoLogin(Request $request){
    // code ....

     $data = $this->validate($request, [
           "email"    => "required|email",
           "password" => "required|min:6|max:10"
     ]);


       if(auth('student')->attempt($data)){

          return redirect(url('/Student/'));

       }else{

        session()->flash('Message',"Error In Your Data Try Again");

        return back();

       }

}


#############################################################################################################################

  function logout(){

      auth('student')->logout();
      return redirect(url('/Login'));

    }

#############################################################################################################################
   function testSession(){

        //   session()->put('message', 'Test Laravel Session Message');   // $_SESSION[KEY] = VALUE
        //   session()->put('message2', 'Test Laravel Session Message');
        //   session()->put('message3', 'Test Laravel Session Message');
       //    session()->flash('message', 'Test Laravel Session Message');

   }



}
