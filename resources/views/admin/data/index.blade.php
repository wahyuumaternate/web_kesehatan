@extends('admin.layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mentah</h1>

    <p class="mb-4">Form Tidak Boleh Kosong</p>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h6> {{ session('success') }}</h6>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mentah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kecamatan</th>
                            <th>Komponen Rumah</th>
                            <th>Sarana Sanitasi</th>
                            <th>Perilaku Penghuni</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i)
                            <tr>
                                <form action="{{ route('data.update', $i->nama_kecamatan) }}" method="POST">
                                    @csrf
                                    <td>{{ $i->nama_kecamatan }}</td>
                                    <td>
                                        <input type="text" class="form-control form-control-user" id="exampleInputtext"
                                            aria-describedby="textHelp" value="{{ $i->k }}" name="k">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-user" id="exampleInputtext"
                                            aria-describedby="textHelp" value="{{ $i->s }}" name="s">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-user" id="exampleInputtext"
                                            aria-describedby="textHelp" value="{{ $i->p }}" name="p">
                                    </td>
                                    <td>
                                        <button class="btn btn-success" type="submit">Simpan</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
