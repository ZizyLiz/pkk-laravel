@extends('../layout/layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.update',$barangkeluar->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Merk</label>
                                <input type="date" class="form-control @error('nama') is-invalid @enderror" name="tgl" value="{{ old('tgl_keluar',$barangkeluar->tgl_keluar) }}" placeholder="Masukkan Nama Siswa">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Seri</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" pattern="[0-9]+" name="qty" value="{{ old('qty_keluar',$barangkeluar->qty_keluar) }}" placeholder="Masukkan Nomor Induk Siswa">
                            
                                <!-- error message untuk nis -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <select name="barang" class="form-control">
                                    @foreach ($barang as $item)
                                        @if ($selected->id == $item->id)
                                        <option value="{{ $item->id }}" selected>{{$item->merk." - ".$item->seri}}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{$item->merk." - ".$item->seri}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control @error('nis') is-invalid @enderror" name="kategori" value="{{ old('kategori',$dBarang->kategori_id) }}" placeholder="Masukkan Nomor Induk Siswa"> --}}
                            
                                <!-- error message untuk nis -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection