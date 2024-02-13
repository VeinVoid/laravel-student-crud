<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.all',[
            'title' => 'All Student',
            "kelas" => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $method = $request->input('method');

        if ($method == 'GET') {
            return view('kelas.post',[
                'title' => 'storePage',
            ]);
        }

        $validate = $request->validate([
            'nama'          => 'required',
        ]);

        $result = Kelas::create($validate);

        if ($result) {
            return redirect()->route('kelas.index')->with('success', "Kelas {$request->nama} has been added.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $method = $request->input('method');

        if ($method == 'PUT') {
            return view('kelas.edit',[
                'title' => 'EditPage',
                'kelas' => $kelas,
            ]);
        }

        $request->validate([
            'name'          => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')->with('danger', "Kelas {$kelas->nama} has been deleted.");
    }
}
