<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(){
        $students = Student::all();
        return view('students.list',compact('students')); 
    }

     public function create()
    {
        return view("students.create");
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' =>'required',
            'email' => 'required|email',
            'phone' =>'required'
        ]);

        Student::create($validated);

        return redirect("students");
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update($id)
    {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $student = Student::find($id);
        $student->update($validated);

        return redirect("students");
    }

    public function destroy($id)
    {
        $students = Student::find($id)->delete();
        return redirect("students");
    }
}
