<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Services\IndonesiaFormatServices;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{

    private IndonesiaFormatServices $indonesiaFormatService;

    public function __construct(IndonesiaFormatServices $indonesia)
    {
        $this->indonesiaFormatService = $indonesia;
    }



    /**
     * Display a listing of the resource.
     */
    public function index(IndonesiaFormatServices $phoneFormatter)
    {
//----- harus di loop
//        $datas = Anggota::with('user_one')->get();
//        foreach ($datas as $anggota) {
//            $user = $anggota->user_one;
//            dd( $user);
//        }

//------ mendapat kan id
//        Anggota::find(3)->user_one;

//--------dengan paginate
//        $anggotaPaginated = Anggota::with('user_one')->paginate(10);
//        foreach ($anggotaPaginated as $anggota) {
//            $user = $anggota->user_one;
//              dd($user);
//        }

// paling jelas relational
//dd($phoneFormatter->formatPhoneNumber('123121212'));
//        dd($this->indonesiaFormatService->formatPhoneNumber(123123));

        $anggotaWithUsers = DB::table('anggotas')
            ->join('users', 'anggotas.id_user', '=', 'users.id')
            ->select('anggotas.*', 'users.name','users.email') // Select the columns you need
            ->paginate(10);
//        dd($anggotaWithUsers);


        return view('anggota.index',
            ['datas' => $anggotaWithUsers]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaRequest $request)
    {
        Anggota::create($request->validated());
        return redirect()
            ->route('anggota.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//dd(Anggota::query()->findOrFail($id));
        return view('anggota.detail',
            ['datas' => Anggota::query()->findOrFail($id)]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view(
            'anggota.edit',
            ['datas' => Anggota::query()->findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaRequest $request, string $id)
    {
//        dd($id);
//        dd($request->validated());
        $datas = Anggota::query()->findOrFail($id);

        $datas->update($request->validated());
        return redirect()
            ->route('anggota.show', $id)
            ->with('message', 'Data Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::destroy($id);
        return redirect()
            ->route('anggota.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }
}
