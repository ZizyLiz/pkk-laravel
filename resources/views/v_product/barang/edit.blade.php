@extends('../layout/layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update',$dBarang->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Merk</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="merk" value="{{ old('merk',$dBarang->merk) }}" placeholder="Masukkan Nama Siswa">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Seri</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="seri" value="{{ old('seri',$dBarang->seri) }}" placeholder="Masukkan Nomor Induk Siswa">
                            
                                <!-- error message untuk nis -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Spesifikasi</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="specs" value="{{ old('spesifikasi',$dBarang->spesifikasi) }}" placeholder="Masukkan Nomor Induk Siswa">
                            
                                <!-- error message untuk nis -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <select name="kategori" class="form-control">
                                    @foreach ($Barang as $item)
                                        @if ($selected->id == $item->id)
                                        <option value="{{ $item->id }}" selected>{{$item->deskripsi}}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{$item->deskripsi}}</option>
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