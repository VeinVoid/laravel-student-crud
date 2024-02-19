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
        $filterSearch = request('search');

        $students = Student::whereHas('kelas', function ($query) use ($auth) {
            $query->where('school_id', $auth->school_id);
        })->when($filterSearch, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('role', 'asc')
        ->paginate(7);

        return view('dashboard.student',[
            'title' => 'All Student',
            "students" => $students
        ]);
    }

    public function storeView()
    {
        $kelas = Kelas::all();

        return view('student.post',[
            'title' => 'storePage',
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request)
    {
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

    public function updateView(Student $student)
    {
        $kelas = Kelas::all();

        return view('student.edit',[
            'title' => 'EditPage',
            'student' => $student,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, Student $student)
    {
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
