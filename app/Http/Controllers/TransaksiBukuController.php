<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransaksiBukuController extends Controller
{
    public function DaftarPinjam(): View
    {

        return view('transaksi.daftar_pinjam',
            ['datas' => DB::table('peminjams')
                ->join('bukus', 'peminjams.id_buku', '=', 'bukus.id')
                ->join('anggotas', 'peminjams.id_anggota', '=', 'anggotas.id')
                ->join('petugas', 'peminjams.id_petugas', '=', 'petugas.id')
                ->select('peminjams.*',
                    'bukus.judul  as nama_buku', 'bukus.jumlah',
                    'anggotas.nama  as nama_peminjam', 'anggotas.no_tlp  as no_tlp'
                )->where('peminjams.status', '=', 'daftar')
                ->paginate()]);
    }

    public function SedangPinjam(): View
    {

        return view('transaksi.sedang_pinjam',
            ['datas' => DB::table('peminjams')
                ->join('bukus', 'peminjams.id_buku', '=', 'bukus.id')
                ->join('anggotas', 'peminjams.id_anggota', '=', 'anggotas.id')
                ->join('petugas', 'peminjams.id_petugas', '=', 'petugas.id')
                ->select('peminjams.*',
                    'bukus.judul  as nama_buku', 'bukus.jumlah',
                    'anggotas.nama  as nama_peminjam', 'anggotas.no_tlp  as no_tlp'
                )->where('peminjams.status', '=', 'sedang')
                ->paginate()]);

    }

    public function SelesaiPinjam(): View
    {
        return view('transaksi.selesai_pinjam',
            ['datas' => DB::table('peminjams')
                ->join('bukus', 'peminjams.id_buku', '=', 'bukus.id')
                ->join('anggotas', 'peminjams.id_anggota', '=', 'anggotas.id')
                ->join('petugas', 'peminjams.id_petugas', '=', 'petugas.id')
                ->select('peminjams.*',
                    'bukus.judul  as nama_buku', 'bukus.jumlah',
                    'anggotas.nama  as nama_peminjam', 'anggotas.no_tlp  as no_tlp'
                )->where('peminjams.status', '=', 'selesai')
                ->paginate()]);
    }

    public function DetailSelesai(string $id): View
    {
        return view('transaksi.detail_selesai',
            ['datas' => DB::table('peminjams')
                ->join('bukus', 'peminjams.id_buku', '=', 'bukus.id')
                ->join('petugas', 'peminjams.id_petugas', '=', 'petugas.id')
                ->join('anggotas', 'peminjams.id_anggota', '=', 'anggotas.id')
                ->join('users', 'anggotas.id_user', '=', 'users.id')
                ->select(
                    'anggotas.img as img_anggota', 'anggotas.no_tlp as no_tlp_anggota', 'anggotas.nama as nama_anggota', 'peminjams.*',
                    'bukus.img as img_buku', 'bukus.*',
                    'petugas.img as img_petugas', 'petugas.no_tlp as no_tlp_petugas', 'petugas.nama as nama_petugas', 'petugas.*',
                    'users.email'
                )
                ->where('peminjams.status', '=', 'selesai')
                ->where('peminjams.id', '=', $id)
                ->first()]);
    }

    public function DaftarDenda(): View
    {
        $datas = DB::table('pengembalians')
            ->join('bukus', 'pengembalians.id_buku', '=', 'bukus.id')
            ->join('anggotas', 'pengembalians.id_anggota', '=', 'anggotas.id')
            ->join('petugas', 'pengembalians.id_petugas', '=', 'petugas.id')
            ->select('pengembalians.*',
'bukus.*',
'anggotas.*','anggotas.nama as nama_peminjam','anggotas.no_tlp as no_tlp_anggota',
'petugas.*','petugas.nama as nama_petugas','petugas.no_tlp as no_tlp_petugas',
//                'bukus.judul  as nama_buku', 'bukus.jumlah',
//                'anggotas.nama  as nama_peminjam', 'anggotas.no_tlp  as no_tlp'
            )->paginate(10);
//        dd($datas);
        return view('transaksi.daftar_denda',['datas' => $datas]);

    }

    public function Daftar(string $id)
    {

        DB::table('peminjams')
            ->where('id', $id)
            ->update(['status' => 'daftar']);

        return redirect()
            ->route('daftar-pinjam')
            ->with('message', 'Data Berhasil Di Ubah');

    }

    public function Terima(string $id)
    {

        DB::table('peminjams')
            ->where('id', $id)
            ->update(['status' => 'sedang']);

        return redirect()
            ->route('daftar-pinjam')
            ->with('message', 'Data Berhasil Di Ubah');

    }

    public function Selesai(string $id)
    {
        DB::table('peminjams')
            ->where('id', $id)
            ->update(['status' => 'selesai']);

        return redirect()
            ->route('sedang-pinjam')
            ->with('message', 'Data Berhasil Di Ubah');

    }


    public function Kembali(Request $request)
    {

        $formFields = $request->validate([
            'tgl_kembali' => 'required',
            'denda' => 'required',
            'keterangan' => 'required',
            'id_pinjam' => 'required',
            'id_buku' => 'required',
            'id_anggota' => 'required',
            'id_petugas' => 'required',
        ]);

        $id_pinjam = Pengembalian::query()->where('id_pinjam', '=', $formFields['id_pinjam'])->first();

        if ($id_pinjam !== null) {
//            dd('data');
            session()->flash('error', 'Sudah Ada');
            return redirect()->back();
        }

        Pengembalian::create($formFields);

        return redirect()
            ->route('detail-selesai', $formFields['id_pinjam'])
            ->with('message', 'Data Berhasil Di Ubah');

    }


    public function Batal(string $id): View
    {
        Peminjam::destroy($id);
        return view('transaksi.daftar_denda');

    }
}
