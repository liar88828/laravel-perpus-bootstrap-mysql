<x-layout>
    <div class="container">
        <h1>iki buku</h1>

        <div>
{{--            <a class="btn btn-primary" href="{{ route('buku.create') }}">Create buku</a>--}}
{{--            <a class="btn btn-info" href="{{ route('buku.edit') }}">Create Edit</a>--}}
        </div>

        <div>
            <table id="example" class="table table-striped table-hover border">
                <caption>Detail Buku</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</x-layout>
<script> new DataTable('#example');
</script>
