@php use Carbon\Carbon;

$loanDate = Carbon::parse($datas->tgl_pinjam);
$cekTelat = Carbon::parse($datas->tgl_pinjam)->isPast();
$currentDate = Carbon::now();

$differenceInDays = $currentDate->diffInDays($loanDate);

if ($differenceInDays < 0) {
    $overdueDays = 0;
} else {
    $overdueDays = $differenceInDays;
}
@endphp

<x-layout>
    {{--        @dd($datas)--}}
    <div class="container">
        <a class="btn btn-secondary mb-5" href="{{ route('selesai-pinjam' )}}">Back</a>

        <div class="row gap-3">
            @if(session()->has('error'))
{{--                @dd(session('error'))--}}
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="col-lg">
                <div class="card mb-3">
                    <h5 class="card-header">Anggota</h5>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$datas->img_anggota}}" class="img-fluid rounded-start" alt="img_anggota">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$datas->nama_anggota}}</h5>
                                <p class="card-text row">
                                    <span>Alamat : {{$datas->alamat}}</span>
                                    <span>No Telephone : @formattedNumber($datas->no_tlp_anggota)</span>
                                    <span>Email : {{$datas->email}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <h5 class="card-header">Buku</h5>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$datas->img_buku}}" class="img-fluid rounded-start" alt="img_anggota">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$datas->judul}}</h5>
                                <p class="card-text row">
                                    <span>ISBN : {{$datas->isbn}}</span>
                                    <span class="text-capitalize text-nowrap">Pengarang : {{$datas->pengarang}}</span>
                                    <span class="text-capitalize text-nowrap">penerbit : {{$datas->penerbit}}</span>
                                    <span class="text-capitalize text-nowrap">tahun : {{$datas->tahun}}</span>
                                    <span class="text-capitalize text-nowrap">jumlah : {{$datas->jumlah}}</span>
                                    <span class="text-capitalize text-nowrap">kategori : {{$datas->kategori}}</span>
                                    <span class="text-capitalize text-nowrap">tipe : {{$datas->tipe}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg">
                <div class="card mb-3">
                    <h5 class="card-header">Petugas</h5>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$datas->img_petugas}}" class="img-fluid rounded-start" alt="img_anggota">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$datas->nama_petugas}}</h5>
                                <p class="card-text row">
                                    <span>No Telephone : @formattedNumber($datas->no_tlp_petugas)</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="card" action="{{ route('kembali-id') }}" method="post">
                    @csrf
                    <h5 class="card-header">Keterangan</h5>
                    <div class="card-body">

                        <p class="card-text">
                            <strong>Waktu Pinjam</strong>
                            <strong
                                class="badge {{$cekTelat? 'text-bg-danger' : 'text-bg-info' }}">{{ $datas->tgl_pinjam }}</strong>
                        </p>
                        <p>
                            <strong>Status Pinjam</strong>
                            <strong>{{$datas->status}}</strong>
                        </p>
                        <p>
                            <strong>  {{$cekTelat? 'Telat Waktu' : 'Tepat Waktu' }}</strong>
                            <strong class="badge text-bg-danger">  {{ $overdueDays }}</strong>

                        </p>
                        <div class="d-flex  gap-5">
                            <div class="mb-3">
                                <label for="denda" class="form-label"><strong> Denda</strong></label>
                                <input name="denda" type="number" class="form-control"/>
                                @error('denda')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_kembali" class="form-label"><strong> Tanggal Kembali</strong></label>
                                <input name="tgl_kembali" type="date" min="{{Carbon::now()->subWeek(3)}}"
                                       class="form-control"/>
                                {{--                            <strong class="badge text-bg-danger">  @convertToRupiah(200000)</strong>--}}
                                @error('tgl_kembali')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <p class="card-text">
                            <strong>Keterangan</strong>
                            <textarea class='form-control'
                                      name="keterangan">{{--                                value={{$datas->keterangan}}--}}</textarea>
                        @error('keterangan')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        </p>
                        <input type="hidden" value="{{$datas->id}}" name="id_pinjam">
                        <input type="hidden" value="{{$datas->id_buku}}" name="id_buku">
                        <input type="hidden" value="{{$datas->id_petugas}}" name="id_petugas">
                        <input type="hidden" value="{{$datas->id_anggota}}" name="id_anggota">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-layout>
