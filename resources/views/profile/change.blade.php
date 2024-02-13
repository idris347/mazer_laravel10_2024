@extends('kerangka.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Akun Pengguna</h3>
                <p class="text-subtitle text-muted">A page where this page can change account security settings</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Security</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ubah Password</h5>
                    </div>
                    <div id="n">
                        @if (Session('status'))
                        <div class="alert alert-success">{{ Session('status') }}</div>
                        @elseif (Session('error'))
                        <div  class="alert alert-danger">{{ Session('error') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('resetPass') }}" method="POST">
                            @csrf
                            @foreach ($data as $user)
                            <input type="hidden" name="is_admin" value="{{ $user->is_admin}}" required>

                            @endforeach
                            <div class="form-group my-2">
                                <label for="current_password" class="form-label">Masukan Password Lama</label>
                                <input type="password" name="old_password" id="current_password"
                                    class="form-control" placeholder="Enter your current password"
                                    >
                            </div>
                            <div class="form-group my-2">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    placeholder="Enter new password" >
                                    @error('new_password')
                                    <span id="i" class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="repeat_password" id="confirm_password"
                                    class="form-control" placeholder="Enter confirm password" value="">
                                    @error('repeat_password')
                                    <span id="b" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Delete Account</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <p>Your account will be permanently deleted and cannot be restored, click "Touch me!" to continue</p>
                            <div class="form-check">
                                <div class="checkbox">
                                    <input type="checkbox" id="iaggree" class="form-check-input">
                                    <label for="iaggree">Touch me! If you agree to delete permanently</label>
                                </div>
                            </div>
                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger" id="btn-delete-account" disabled>Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection