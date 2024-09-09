<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        $students = student::all();
        return view('student.index', ['students' => $students]);
    }

    public function studentcreate(){
     
    }

    public function store(Request $request){
        
        // dd($request);
        $data = $request->validate([

            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
        ]);

        $newStudent = student::Create($data);
        return redirect(route('student.index'))->with('success', 'Student Data Addedd Successfully');
    }      

    public function edit(student $student){
       

    }

    public function update(student $student, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
        ]);

       $student->update($data);
       return redirect(route('student.index'))->with('success', 'Student Data Updated successfully');
    }

    public function delete(student $student){
        $student->delete();
        return redirect(route('student.index'))->with('success', 'Student Data Deleted successfully');

    }
}
