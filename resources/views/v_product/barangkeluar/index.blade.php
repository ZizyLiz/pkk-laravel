@extends('../layout/layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('barangkeluar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a> 
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
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Merk</th>
                            <th>Seri</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangkeluar as $rowbarang)
                        <tr>
                            <td>{{$n+=1}}</td>
                            {{-- <td>{{ $rowbarang->id  }}</td> --}}
                            <td>{{ $rowbarang->tgl_keluar }}</td>
                            <td>{{ $rowbarang->qty_keluar }}</td>
                            <td>{{ $rowbarang->barang->merk }}</td>
                            <td>{{ $rowbarang->barang->seri }}</td>
                            <td class="text-center"> 
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluar.destroy', $rowbarang->id) }}" method="POST">
                                    <a href="{{ route('barangkeluar.show', $rowbarang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('barangkeluar.edit', $rowbarang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
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