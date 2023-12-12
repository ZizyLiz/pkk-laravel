@extends('../layout/layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                                <tr>
                                    <td>Merk</td>
                                    <td>{{ $barang->merk }}</td>
                                </tr>
                                <tr>
                                    <td>Seri</td>
                                    <td>{{ $barang->seri}}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $barang->spesifikasi}}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>{{ $barang->stok}}</td>
                                </tr>
                                <tr>
                                    <td>Rombel</td>
                                    <td>{{ $barang->kategori->deskripsi}}</td>
                                </tr>
                        </table>
                    </div>
            </div>
            </div>
        </div>
        <div class="row flex mt-2">
            <div class="flex col-md-12">
                <a href="{{ route('barang.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection
