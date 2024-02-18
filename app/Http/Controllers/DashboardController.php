<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homeView()
    {
        $schoolCount = School::count(); 
        $headmasterCount = Teacher::where('role', 'headmaster')->count(); 
        $teacherCount = Teacher::where('role', 'teacher')->count();
        $studentCount = Student::all()->count();

        return view('dashboard.home',[
            'title'             => 'homePage',
            'schoolCount'       => $schoolCount,
            'headmasterCount'   => $headmasterCount,
            'teacherCount'      => $teacherCount,
            'studentCount'      => $studentCount,
        ]);
    }
}
