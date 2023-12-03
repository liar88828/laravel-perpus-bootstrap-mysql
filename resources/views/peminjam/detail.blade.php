<x-layout>
    {{--@dd($datas)--}}
    <div class="container">
        <a class="btn btn-secondary mb-5" href="{{ route('petugas.index' )}}">Back</a>

        <div class="row">

            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            {{--                                 Photos         --}}
                            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                                <img class="rounded" src="{{$datas->img}}" alt="...">
                            </div>
                            {{--                                Bio Data            --}}
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white p-2 capital">{{$datas->nama}}</h3>
                                    {{--                                        <span class="text-primary">Coach</span>--}}
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Alamat:</span>
                                        {{$datas->alamat}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">Jenis Kelamin:</span>
                                        {{$datas->jenis_kelamin}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">No Telephone:</span>
                                        @formattedNumber($datas->no_tlp)

                                    </li>


                                    <li class="mb-2 mb-xl-3  display-28">
                                        {{--  edit   edit  edit                     edit --}}
                                        <a class="btn btn-primary" href="{{route('petugas.edit',$datas->id)}}">Edit</a>
                                        <a class="btn btn-info">Cetak Kartu</a>
                                        {{--                                        <a class="btn btn-success"></a>--}}

                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--                about----               --}}
            {{--            <div class="col-lg-12 mb-4 mb-sm-5">--}}
{{--            <div></div>--}}
            {{--            </div>--}}
            {{--                Skill                  --}}
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5 ">

                        {{--                             Education          --}}
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Buku Yang Di Pinjam
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Anton Wibowo</h5>
                                    <p class="card-text">Bukube sitik Warnane</p>
                                    {{--                                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                                </div>
                            </div>
                        </div>

                        {{--        last                 --}}
                        <div  class="mt-2">
                            <div class="card">
                                <div class="card-header">
                                    Buku Yang Pernah Di Pinjam
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Anton Wibowo</h5>
                                    <p class="card-text">Bukube sitik Warnane</p>
                                    {{--                                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
