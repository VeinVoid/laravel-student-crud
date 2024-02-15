<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SchoolsController extends Controller
{
    public function index()
    {
        $filterType = request('type') ? request('type') : 'all';
        $filterSearch = request('search');

        $totalStudents = 0;

        $schools = School::with(['kelas.students', 'teachers'])
            ->when($filterType != 'all', function ($query) use ($filterType) {
                return $query->where('type', $filterType);
            })
            ->when($filterSearch, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();
        
        $schools->each(function ($school) use (&$totalStudents) {
            $school->headmaster = $school->teachers->where('role', 'headmaster')->first();

            foreach ($school->kelas as $kelas) {
                $totalStudents += $kelas->students->count();
            }
        });

        return view('dashboard.school', [
            'title' => 'Schools',
            'schools' => $schools,
            'totalStudents' => $totalStudents,
            'filterType' => $filterType,
            'filterSearch' => $filterSearch
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(School $school)
    {
        //
    }

    public function update(Request $request, School $school)
    {
        //
    }

    public function destroy(School $school)
    {
        //
    }
}
