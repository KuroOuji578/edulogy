@extends('template.main')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data Agama</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('agama.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nama Agama</label>
              <input name="nama_agama" type="text" value="{{ old('nama_agama')}}" class="form-control {{ $errors->first('nama_agama') ? "is-invalid":""}}" id="basic-default-fullname" placeholder="Masukan Nama Agama" />
              @error('nama_agama')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection