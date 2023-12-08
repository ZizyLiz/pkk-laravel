@extends('../layout/layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('kategori.store') }}" method="POST">                    
                            @csrf

                            
                            <div class="form-group">
                                <label class="font-weight-bold">Barang</label>
                                <select class="form-control" name="kat" aria-label="Default select example">
                                    <option value="">--Pilih--</option>
                                    @foreach ($val as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                                
                                <!-- error message untuk kelas -->
                                @error('kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="desc" value="{{ old('desc') }}" placeholder="Masukkan Jumlah">
                            
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