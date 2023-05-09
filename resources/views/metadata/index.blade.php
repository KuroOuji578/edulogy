@extends('template.main')
@section('content')

<div class="col-md-10">
</div>
<div class="col-xl-12">
    <h6 class="text-muted">Basic</h6>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button
            type="button"
            class="nav-link active"
            role="tab"
            data-bs-toggle="tab"
            data-bs-target="#navs-siswa"
            aria-controls="navs-pills-top-home"
            aria-selected="true"
          >
            Siswa
          </button>
        </li>
        <li class="nav-item">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-agama"
              aria-controls="navs-pills-top-profile"
              aria-selected="false"
            >
              Agama
            </button>
          </li>
        <li class="nav-item">
          <button
            type="button"
            class="nav-link"
            role="tab"
            data-bs-toggle="tab"
            data-bs-target="#navs-jurusan"
            aria-controls="navs-pills-top-messages"
            aria-selected="false"
          >
            Jurusan
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-siswa" role="tabpanel">
            <div class="card">
                <h5 class="card-header">Data Siswa</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No.Reg</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @php
                            $no = 1;
                        @endphp
                        @foreach ($register as $item)
                        <tr>
                            <th>{{$no}}</th>
                            <td>{{$item->nama}}</td>
                            <td>
                              @if ($item->jk == "L")
                                  Laki-Laki
                              @else
                                  Perempuan
                              @endif
                            </td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->agama->agama}}</td>
                            <td>{{$item->asal_sekolah}}</td>
                            <td>{{$item->jurusan->nama_jurusan}}</td>
                            <td>
                                <a href="{{ route('register.edit', $item->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                &nbsp;
                                <a href="{{ route('register.destroy', $item->id) }}">
                                    <button onclick="return confirm('Yakin data {{$item ['nama']}} dihapus?')" type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                   @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <div class="tab-pane fade" id="navs-agama" role="tabpanel">
            <div class="card">
                <div class="row">
                    <h5 class="card-header col-md-10">Data Agama</h5>
                    <div class="col-md-2">
                        <a href="{{ route('agama.create') }}">
                            <button class="btn btn-primary">tambah</button>
                        </a>
                    </div>
                </div>
                
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10%">no</th>
                        <th style="width: 50%">Agama</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($agama as $item)
                        <tr>
                            <th>{{$no}}</th>
                            <td>{{$item->agama}}</td>
                            <td>
                                <a href="{{ route('agama.edit', $item->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                &nbsp;
                                <a href="{{ route('agama.destroy', $item->id) }}">
                                    <button onclick="return confirm('Yakin data {{$item ['agama']}} dihapus?')" type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                   @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <div class="tab-pane fade" id="navs-jurusan" role="tabpanel">
            <div class="card">
              <div class="row">
                <h5 class="card-header col-md-10">Data Jurusan</h5>
                <div class="col-md-2">
                    <a href="{{ route('jurusan.create') }}">
                        <button class="btn btn-primary">tambah</button>
                    </a>
                </div>
            </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jurusan as $item)
                        <tr>
                            <th>{{$no}}</th>
                            <td>{{$item->nama_jurusan}}</td>
                            <td>
                                <a href="{{ route('jurusan.edit', $item->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                &nbsp;
                                <a href="{{ route('jurusan.destroy', $item->id) }}">
                                    <button onclick="return confirm('Yakin data {{$item ['nama_jurusan']}} dihapus?')" type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
      </div>
    </div>
</div>
@endsection