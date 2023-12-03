<x-layout>
    <x-nav_menu/>
    <div class="container-xxl">

        <table class="table table-striped table-hover border">
            {{--                <caption>New York City Marathon Results 2013</caption>--}}
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col text-capitalize">nama peminjam</th>
                <th scope="col text-capitalize">no telephone</th>
                <th scope="col text-capitalize">buku</th>
                <th scope="col text-capitalize">tanggal pinjam</th>
                <th scope="col text-capitalize">jumlah</th>
                <th scope="col text-capitalize">Aksi</th>
            </tr>
            </thead>
            <tbody>


            @foreach($datas as $key=> $d)

                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$d->nama_peminjam}}</td>
                    <td class="text-nowrap">@formattedNumber($d->no_tlp)</td>

                    <td>{{$d->nama_buku}}</td>
                    <td>{{$d->tgl_pinjam}}</td>
                    <td>{{$d->jumlah}}</td>
                    <td>
                        <div>
                            <a href="{{ route('detail-selesai',$d->id) }}" class="btn btn-info">Detail</a>

                            <form action="{{route('terima-id',$d->id)}}" method="post">
                                @csrf()
                                <button class="btn btn-danger">Batal</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{ $datas->links() }}
    </div>

</x-layout>
