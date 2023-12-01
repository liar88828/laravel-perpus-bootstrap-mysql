<x-layout>

    <div class="container">
        <a class="btn btn-secondary mb-5" href="{{ route('anggota.show',$datas->id) }}">Back</a>

        <form action="{{route('anggota.update',$datas->id)}}" method="POST">
            @method('PUT')
            @csrf()

            <input type="hidden" class="form-control" name="id_user" value="{{$datas->id}}">

            <div class="d-flex gap-3">
                <div class="w-50">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{old('nama',$datas->nama)}}">
                        @error('nama')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{old('alamat',$datas->alamat)}}">
                        @error('alamat')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin"
                                value="{{old('jenis_kelamin',$datas->jenis_kelamin)}}">
                            <option value="Laki-Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="w-50">
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telephone</label>
                        <input type="tel" class="form-control" name="no_tlp" value="{{old('no_tlp',$datas->no_tlp)}}"/>
                        @error('no_tlp')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="denda" class="form-label">Denda</label>
                        <input type="number" class="form-control" name="denda" value="{{old('denda',$datas->denda)}}"/>
                        @error('denda')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-layout>
