<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class CrudController extends Controller
{
    
    public function index()
    {
        $stu = Student::all();
        return view('crudtable',['data'=>$stu]);
    }

   
    public function create()
    {
        return view('crudregister');
    }

   
    public function store(Request $r)
    { 
        
        $stu = new Student;
        $stu->name =$r->name;
        $stu->email =$r->email;
        $stu->password =$r->password;
        $stu->mobile =$r->mobile;
        if($stu->save()){
        return  redirect('/');       
     }
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $stu=Student::find($id);
        return view('update',compact('stu'));

    }

    public function update(Request $request, $id)
    {
         $stu = Student::find($id);

    if ($stu) {
        return redirect('/')->with('error', 'Student not found');
    }
       
    $stu->name = $request->input('name');
    $stu->email = $request->input('email');
    $stu->password = $request->input('password');
    $stu->mobile = $request->input('mobile');

        $stu->save();
        return redirect('/');

    









        // Find the student by ID
        // $stu = Student::find($id);
    
        // Check if student exists
        // if ($stu) {
            // Update student attributes with request data
            // $stu->update($request->all());
    
        //     return back()->with('success', 'Data updated successfully!');
        // } else {
        //     return back()->with('error', 'Student not found!');
        // }
    }
    

    public function destroy($id)
    {
        $stu = Student::find($id);  
        if ($stu) {
            $stu->delete(); 
            return back()->with('success', 'Data deleted successfully!'); 
        } else {
            return back()->with('error', 'Student not found!');
        }
    }
}    
