<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $getData = User::get();
        // dd($getData);
        return response()->json([
            'code' => 200,
            'data' =>$getData,
            'mes' => 'Data get successfully !'
        ]);
    
    }


    public function delete($id)
    {
        
        // $user = User::find($request->id);
        $user = User::find($id);

     

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'Student Record not found',
            ]);
        }

        $checkDelete = $user->delete();
        // dd( $checkDelete);
        if(!$checkDelete){
            return response()->json('The user not delete');  
        }
        return response()->json([
            'code' => 200,
            'data' =>$user,
            'mes' => 'The user successfully deleted !'
        ]);

    }

      public function update(Request $request, $id)
    {
        $user = Student::find($id);
        if(!$user){
            return response()->json([
                'status' => 404,
                'message' => 'Record not found',
               
            ]);
        }
       

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $record = $user->update();

        if($record){
            return response()->json([
                'status' => 200,
                'message' => 'Record Update successfully',
               
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Record Not Saved ',
            ]);
        }
    }
}
