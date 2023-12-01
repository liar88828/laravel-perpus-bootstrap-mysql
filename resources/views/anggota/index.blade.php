<x-layout>
{{--        @dd($datas)--}}
    <div class="container">
{{--        @if(session()->has('message'))--}}
{{--            <div class="alert alert-success mt-2">{{ session('message')}}</div>--}}
{{--        @endif--}}

        <div>
{{--            <a class="btn btn-primary mb-5" href="{{ route('anggota.create') }}">Create anggota</a>--}}

            {{--            <a class="btn btn-info" href="{{ route('anggota.edit') }}">Edit Buku</a>--}}
        </div>

        <div>
            <table class="table table-striped table-hover border">
                {{--                <caption>New York City Marathon Results 2013</caption>--}}
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama</th>
                    <th scope="col">alamat</th>
                    <th scope="col">jenis_kelamin</th>
                    <th scope="col">email</th>
                    <th scope="col">no_tlp</th>
                    <th scope="col">denda</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $key=> $d)

                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->jenis_kelamin}}</td>
                        <td>{{$d->email}}</td>
                        <td class="text-nowrap">@formattedNumber($d->no_tlp)</td>
                        <td class="text-nowrap">@convertToRupiah($d->denda)</td>
                        <td>
                            <div>
                                <form action="{{route('anggota.destroy',$d->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf()
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a class="btn btn-info" href="{{route('anggota.show',$d->id)}}">Detail</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
        {{ $datas->links() }}
    </div>

</x-layout>
{{--<script> new DataTable('#example');--}}
{{--</script>--}}
