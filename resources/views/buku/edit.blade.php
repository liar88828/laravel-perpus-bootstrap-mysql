<x-layout>
    <div class="container">
{{--            @dd($data)--}}

        <form action="{{route('buku.update',$data->id)}}" method="POST">
            @method('PUT')
            @csrf()

            <div class="d-flex gap-3">
                <div class="w-50">

                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" name="isbn" value="{{old('isbn',$data->isbn)}}"
                        @error('isbn')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                        >
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" value="{{old('judul',$data->judul)}}">
                        @error('judul')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" value="{{old('pengarang',$data->pengarang)}}">
                        @error('pengarang')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" value="{{old('penerbit',$data->penerbit)}}">
                        @error('penerbit')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror

                    </div>
                </div>

                <div class="w-50">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">tahun</label>
                        <input type="date" class="form-control" name="tahun"
                               value="{{old('tahun',$data->tahun)}}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah"
                               value="{{old('jumlah',$data->jumlah)}}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori"
                               value="{{old('kategori',$data->kategori)}}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <input type="text" class="form-control" name="tipe"
                               value="{{old('tipe',$data->tipe)}}"
                        >
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</x-layout>