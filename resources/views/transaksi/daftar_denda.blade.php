<x-layout>
    <x-nav_menu/>
    <div class="container-xxl">

        <table class="table table-striped table-hover border">
            {{--                <caption>New York City Marathon Results 2013</caption>--}}
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col text-capitalize">nama peminjam</th>
                <th scope="col text-capitalize">no telephone peminjam</th>
                <th scope="col text-capitalize">buku</th>
                <th scope="col text-capitalize">tanggal kembali</th>
                <th scope="col text-capitalize">petugas</th>
                @if( auth()->user()->role==='petugas' )
                <th scope="col text-capitalize">Aksi</th>
                @endif
            </tr>
            </thead>
            <tbody>


            @foreach($datas as $key=> $d)

                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$d->nama_peminjam}}</td>
                    <td class="text-nowrap">@formattedNumber($d->no_tlp)</td>
                    <td>{{$d->judul}}</td>
                    <td>{{$d->tgl_kembali}}</td>
                    <td>{{$d->nama_petugas}}</td>
                    @if( auth()->user()->role==='petugas' )
                    <td>
                        <div>
                            <a href="{{ route('detail-selesai',$d->id) }}" class="btn btn-info">Detail</a>

                            <form action="{{route('terima-id',$d->id)}}" method="post">
                                @csrf()
                                <button class="btn btn-danger">Batal</button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach

            </tbody>

        </table>
        {{ $datas->links() }}

    </div>

</x-layout>
