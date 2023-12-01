<x-layout>
    {{--    @dd($data)--}}
    <div class="container">
        <h1>iki buku</h1>
        @if(session()->has('message'))
            <div class="alert alert-success mt-2">{{ session('message')}}</div>
        @endif

        <div>
            <a class="btn btn-primary" href="{{ route('buku.create') }}">Create buku</a>

            {{--            <a class="btn btn-info" href="{{ route('buku.edit') }}">Edit Buku</a>--}}
        </div>

        <div>
            <table
                {{--                id="example"--}}
                class="table table-striped table-hover border"
            >
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $d)

                    <tr>
                        <th scope="row">{{$d->index+1}}</th>
                        <td>{{$d->isbn}}</td>
                        <td>{{$d->judul}}</td>
                        <td>{{$d->pengarang}}</td>
                        <td>{{$d->penerbit}}</td>
                        <td>{{$d->tahun}}</td>
                        <td>{{$d->jumlah}}</td>
                        <td>{{$d->kategori}}</td>
                        <td>{{$d->tipe}}</td>
                        <td>
                            <div>
                                <form action="{{route('buku.destroy',$d->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf()
                                    <button class="btn btn-danger">Delete</button>
                                </form>

                                <a class="btn btn-info" href="{{route('buku.edit',$d->id)}}">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
</x-layout>
{{--<script> new DataTable('#example');--}}
{{--</script>--}}
