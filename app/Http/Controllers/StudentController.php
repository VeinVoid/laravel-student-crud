<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = auth()->user();

        $students = Student::join('kelas', 'students.id_kelas', '=', 'kelas.id')
            ->where('kelas.school_id', $auth->school_id)
            ->orderBy('students.id_kelas', 'asc')
            ->get();

        return view('student.all',[
            'title' => 'All Student',
            "students" => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $method = $request->input('method');
        $kelas = Kelas::all();

        if ($method == 'GET') {
            return view('student.post',[
                'title' => 'storePage',
                'kelas' => $kelas
            ]);
        }

        $validate = $request->validate([
            'NIS'           => 'required | numeric',
            'name'          => 'required',
            'tahun_lahir'   => 'required',
            'id_kelas'      => 'required | numeric',
            'alamat'        => 'required',
            'image'         => 'nullable',
        ]);

        $result = Student::create($validate);

        if ($result) {
            return redirect()->route('students.index')->with('success', "Student {$request->name} has been added.");
        }
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


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $method = $request->input('method');
        $kelas = Kelas::all();

        if ($method == 'PUT') {
            return view('student.edit',[
                'title' => 'EditPage',
                'student' => $student,
                'kelas' => $kelas
            ]);
        }

        $request->validate([
            'NIS'           => 'nullable',
            'name'          => 'nullable',
            'tahun_lahir'   => 'nullable',
            'kelas'         => 'nullable',
            'alamat'        => 'nullable',
            'image'         => 'nullable',
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

        return redirect()->route('students.index')->with('danger', "Student {$student->name} has been deleted.");
    }
}
