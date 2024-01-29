<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Student::orderBy('id', 'DESC')->get();
        // dd($getData);
        return response()->json([
            'code' => 200,
            'data' =>$getData,
            'mes' => 'Data get successfully !'
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = new Student();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->phone = $request->phone;
        $record = $newUser->save();

        if($record){
            return response()->json([
                'status' => 200,
                'message' => 'Record Save successfully',
               
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Record Not Saved ',
            ]);
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $user)
    {
        return response()->json([
            'code' => 200,
            'data' =>$user,
            'mes' => 'Data get successfully !'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Student::find($id);
        return response()->json([
            'data' =>$user,
            'status' => 200,
            'message' => 'Record Save successfully',
           
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $record = $user->update();

        if($record){
            return response()->json([
                'status' => 200,
                'message' => 'Record Save successfully',
               
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Record Not Saved ',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Student::find($id);

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
}
