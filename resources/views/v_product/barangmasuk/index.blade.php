@extends('../layout/layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a> 
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
                        @forelse ($barangmasuk as $rowbarang)
                        <tr>
                            <td>{{$n+=1}}</td>
                            {{-- <td>{{ $rowbarang->id  }}</td> --}}
                            <td>{{ $rowbarang->tgl_masuk  }}</td>
                            <td>{{ $rowbarang->qty_masuk }}</td>
                            <td>{{ $rowbarang->barang->merk }}</td>
                            <td>{{ $rowbarang->barang->seri }}</td>
                            <td class="text-center"> 
                                <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data?');" action="{{ route('barangmasuk.destroy', $rowbarang->id) }}" method="POST">
                                    <a href="{{ route('barangmasuk.show', $rowbarang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('barangmasuk.edit', $rowbarang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
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