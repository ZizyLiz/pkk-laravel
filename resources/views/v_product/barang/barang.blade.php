@extends('../layout/layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('barang.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merk</th>
                            <th>Seri</th>
                            <th>Specs</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dBarang as $rowbarang)
                        <tr>
                            <td>{{$n+=1}}</td>
                            {{-- <td>{{ $rowbarang->id  }}</td> --}}
                            <td>{{ $rowbarang->merk  }}</td>
                            <td>{{ $rowbarang->seri }}</td>
                            <td>{{ $rowbarang->spesifikasi }}</td>
                            <td>{{ $rowbarang->stok }}</td>
                            <td>{{ $rowbarang->kategori->deskripsi }}</td>
                            <td class="text-center"> 
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $rowbarang->id) }}" method="POST">
                                    <a href="{{ route('barang.show', $rowbarang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('barang.edit', $rowbarang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <div class="alert">
                                Data Siswa belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection