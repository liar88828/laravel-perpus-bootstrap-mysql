<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('petugas.index',
            ['datas' => DB::table('petugas')
                ->join('users', 'petugas.id_user', '=', 'users.id')
                ->select('petugas.*', 'users.name', 'users.email')
                ->paginate(10)
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetugasRequest $request)
    {
        Petugas::create($request->validated());
        return redirect()
            ->route('petugas.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('petugas.detail',
            ['datas' => Petugas::query()->findOrFail($id)]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view(
            'petugas.edit',
            ['datas' => Petugas::query()->findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetugasRequest $request, string $id)
    {
        $datas = Petugas::query()->findOrFail($id);
        $datas->update($request->validated());
        return redirect()
            ->route('petugas.show', $id)
            ->with('message', 'Data Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Petugas::destroy($id);
        return redirect()
            ->route('petugas.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }
}
