<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\User;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Buku::all();
        return view('buku.index',
            ['data' => Buku::paginate(5)]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        Buku::create($request->validated());
        return redirect()
            ->route('buku.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Buku::query()->findOrFail($id);
        return view('buku.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Buku::query()->findOrFail($id);
        return view(
            'buku.edit',
            ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, string $id)
    {
        $data = Buku::query()->findOrFail($id);
        $resData = $data->update($request->validated());
//dd($resData);
        return redirect()
            ->route('buku.show', $data->id)
            ->with('message', 'Data Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::destroy($id);
        return redirect()
            ->route('buku.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }
}
