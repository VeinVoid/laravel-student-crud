<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.all',[
            'title' => 'All Student',
            "students" => Student::all()
        ]);
    }

    public function create()
    {
        return view('student.post',[
            'title' => 'storePage',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIS' => 'required',
            'name' => 'required',
            'tahun_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'image' => 'required',
            'quotes' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($student)
    {
        return view('student.detail', [
            'title' => "Detail",
            'student' => Student::find($student)
        ]);
    }

    public function edit(Student $student)
    {
        return view('student.edit',[
            'title' => 'EditPage',
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'NIS' => 'required',
            'name' => 'required',
            'tahun_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'image' => 'required',
            'quotes' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
    }
}
