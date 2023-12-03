<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeminjamRequest;
use App\Http\Requests\UpdatePeminjamRequest;
use App\Models\Peminjam;
use Illuminate\Support\Facades\DB;

class PeminjamController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('peminjam.index',
            ['datas' => DB::table('peminjams')
                ->paginate(10)
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeminjamRequest $request)
    {
        Peminjam::create($request->validated());
        return redirect()
            ->route('peminjam.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('peminjam.detail',
            ['datas' => Peminjam::query()->findOrFail($id)]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view(
            'peminjam.edit',
            ['datas' => Peminjam::query()->findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamRequest $request, string $id)
    {
        $datas = Peminjam::query()->findOrFail($id);
        $datas->update($request->validated());
        return redirect()
            ->route('peminjam.show', $id)
            ->with('message', 'Data Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peminjam::destroy($id);
        return redirect()
            ->route('peminjam.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }
}
