@extends('../layout/layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{ $barang->tgl_masuk }}</td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td>{{ $barang->barang->merk}}</td>
                                </tr>
                                <tr>
                                    <td>Seri</td>
                                    <td>{{ $barang->barang->seri}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>{{ $barang->qty_masuk}}</td>
                                </tr>
                        </table>
                    </div>
            </div>
            </div>
        </div>
        <div class="row flex mt-2">
            <div class="flex col-md-12">
                <a href="{{ route('barangmasuk.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection
