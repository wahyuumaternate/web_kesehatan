@extends('admin.layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6> {{ session('success') }}</h6>
                    </div>
                @endif
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="mb-2">
                        <input type="text"
                            class="form-control @error('name')
                            is-invalid
                        @enderror form-control-user"
                            id="exampleInputtext" placeholder="User Name" name="name" value="{{ old('name') }}" />
                        @error('name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="email"
                            class="form-control @error('email')
                        is-invalid
                    @enderror form-control-user"
                            id="exampleInputtext" placeholder="Email" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="password"
                            class="form-control @error('password')
                        is-invalid
                    @enderror form-control-user"
                            id="exampleInputtext" placeholder="Password" name="password" />
                        @error('password')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="password"
                            class="form-control  @error('password_confirmation')
                        is-invalid
                    @enderror form-control-user"
                            id="exampleInputtext" placeholder="Konfirmasi Password" name="password_confirmation" />
                        @error('password_confirmation')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
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
