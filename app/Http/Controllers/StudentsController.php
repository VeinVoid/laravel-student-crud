<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        return view('students',[
            'title' => 'studentsPage',
            "students" => Student::alls()
        ]);  
    }
}
