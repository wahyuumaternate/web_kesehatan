@extends('admin.layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-2">
                        <input type="text" class="form-control form-control-user" id="exampleInputtext"
                            placeholder="User Name" name="name" value="{{ old('name') }}" />
                        @error('name')
                            <span class="pesan-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control form-control-user" id="exampleInputtext"
                            placeholder="Email" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <span class="pesan-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="password" class="form-control form-control-user" id="exampleInputtext"
                            placeholder="Password" name="password" />
                        @error('password')
                            <span class="pesan-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="password" class="form-control form-control-user" id="exampleInputtext"
                            placeholder="Konfirmasi Password" name="password_confirmation" />
                        @error('password_confirmation')
                            <span class="pesan-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-primary" type="submit">SUBMIT</button>
                    </div>
                </form>
            </div> <!-- /.col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
