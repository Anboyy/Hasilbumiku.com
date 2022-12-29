@extends('template.admin')

@section('title', 'Edit Data Pengguna')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data Pengguna</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <input type="hidden" value="{{ $user->id }}" name="id" />
                                    <div class="form-group">
                                        <label for="nameInput">Nama Pengguna</label>
                                        <input type="text" class="form-control" id="nameInput"
                                            placeholder="Masukan Nama Pengguna" name="name" value="{{ $user->name }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nameInput">Role Pengguna</label>
                                        <select class="form-control" name="role"
                                            {{ $user->id == auth()->user()->id ? 'disabled' : '' }}>
                                            <option>---------- Pilih Role ----------</option>
                                            <option value="admin">Admin
                                            </option>
                                            <option value="user">
                                                user</option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
