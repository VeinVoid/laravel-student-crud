<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
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
            ->paginate(7);

        foreach ($schools as $school) {
            $school->headmaster = $school->teachers->where('role', 'headmaster')->first();

            foreach ($school->kelas as $kelas) {
                $totalStudents += $kelas->students->count();
            }
        }

        return view('dashboard.school', [
            'title'         => 'Schools',
            'schools'       => $schools,
            'totalStudents' => $totalStudents,
            'filterType'    => $filterType,
            'filterSearch'  => $filterSearch
        ]);
    }

    public function storeView()
    {
        $province = request('province');
        $city = request('city');

        return view('school.post', [
            'title'      => 'School',
            'provinces'  => Province::all(),
            'cities'     => City::where('province_id', $province)->get(),
            'province'   => $province,
            'city'       => $city
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required',
            'type'      => 'required',
            'address'   => 'required'
        ]);

        $result = School::create($validate);

        if ($result) {
            return redirect()->route('schools.index')->with('success', "School {$request->name} has been added.");
        }
    }

    public function show(School $school)
    {
        //
    }

    public function updateView(School $school)
    {
        $province = request('province');
        $city = request('city');

        return view('school.edit', [
            'title'      => 'School',
            'school'     => $school,
            'provinces'  => Province::all(),
            'cities'     => City::where('province_id', $province)->get(),
            'province'   => $province,
            'city'       => $city
        ]);
    }

    public function update(Request $request, School $school)
    {
        $validate = $request->validate([
            'name'      => 'required',
            'type'      => 'required',
            'address'   => 'required'
        ]);

        $result = $school->update($validate);

        if ($result) {
            return redirect()->route('schools.index')->with('success', "School {$request->name} has been updated.");
        }
    }

    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('schools.index')->with('danger', "School {$school->name} has been deleted.");
    }
}
