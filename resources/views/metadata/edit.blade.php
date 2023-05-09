@extends('template.main')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Data Register</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('register.update', $edit['id']) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nama</label>
              <input name="nama" type="text" value="{{ $edit['nama']}}" class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" id="basic-default-fullname" placeholder="Masukan Nama Lengkap" />
              @error('nama')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Jenis Kelamin</label>
                <div class="col-sm-2">
                    <select name="jk" type="text" value="{{ old('jk')}}" class="form-control {{ $errors->first('jk') ? "is-invalid":""}}">
                        <option hidden>
                          @if ($edit['jk'] == "L")
                                  Laki-Laki
                              @else
                                  Perempuan
                              @endif
                        </option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                    </select>
                    @error('jk')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Alamat</label>
              <input name="alamat" type="text" value="{{ $edit['alamat']}}" class="form-control {{ $errors->first('alamat') ? "is-invalid":""}}" id="basic-default-fullname" placeholder="Masukan Alamat" />
              @error('alamat')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Agama</label>
              <select name="agama_id" type="text" value="{{ old('agama_id')}}" class="form-control {{ $errors->first('agama_id') ? "is-invalid":""}}">
                <option hidden>Pilih Kategori Barang</option>
                @foreach ($agama as $item)
                    <option 
                         @if ($item->id == $edit['agama_id'])
                             {{ "selected"}}
                        @endif value="{{ $item->id}}">

                            {{$item->agama}}
                                         
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Asal Sekolah</label>
              <input name="asal_sekolah" type="text" value="{{ $edit['asal_sekolah']}}" class="form-control {{ $errors->first('asal_sekolah') ? "is-invalid":""}}" id="basic-default-fullname" placeholder="Masukan Asal Sekolah" />
              @error('asal_sekolah')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Jurusan</label>
              <select name="jurusan_id" type="text" value="{{ old('jurusan_id')}}" class="form-control {{ $errors->first('jurusan_id') ? "is-invalid":""}}">
                <option hidden>Pilih Jurusan</option>
                @foreach ($jurusan as $item)
                    <option 
                         @if ($item->id == $edit['jurusan_id'])
                             {{ "selected"}}
                        @endif value="{{ $item->id}}">

                            {{$item->nama_jurusan}}
                                         
                    </option>
                @endforeach
            </select>
            @error('jurusan_id')
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