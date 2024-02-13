<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homeView()
    {
        $schoolCount = School::count(); 
        $headmasterCount = Student::where('role', 'headmaster')->count(); 
        $teacherCount = Student::where('role', 'teacher')->count();
        $studentCount = Student::where('role', 'student')->count();

        return view('dashboard.home',[
            'title' => 'homePage',
            'schoolCount' => $schoolCount,
            'headmasterCount' => $headmasterCount,
            'teacherCount' => $teacherCount,
            'studentCount' => $studentCount,
        ]);
    }
}
