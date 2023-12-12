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
                                    <td>{{ $kategori->kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td>{{ $kategori->deskripsi}}</td>
                                </tr>
                                </tr>
                        </table>
                    </div>
            </div>
            </div>
        </div>
        <div class="row flex mt-2">
            <div class="flex col-md-12">
                <a href="{{ route('kategori.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection
