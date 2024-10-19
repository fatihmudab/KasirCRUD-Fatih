@extends('layout.home')

@section('content')
    <form action="{{ isset($user) ? route('user.edit.update', $user->id) : route('user.tambah.simpan') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($user) ? 'Form Edit User' : 'Form Tambah User' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ isset($user) ? $user->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="administrator"
                                    {{ isset($user) && $user->role == 'administrator' ? 'selected' : '' }}>Administrator
                                </option>
                                <option value="petugas" {{ isset($user) && $user->role == 'petugas' ? 'selected' : '' }}>
                                    Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ isset($user) ? $user->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('user') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
    </form>
@endsection
