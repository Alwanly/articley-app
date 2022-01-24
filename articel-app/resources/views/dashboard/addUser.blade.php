@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">General Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@include('layouts.alert')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        @error('name')
                        <label class="col-form-label" for="inputError">
                            <i class="fas fa-times-circle"> </i>{{ $message }}
                        </label>
                        @enderror
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        @error('email')
                        <label class="col-form-label" for="inputError">
                            <i class="fas fa-times-circle"> </i>{{ $message }}
                        </label>
                        @enderror

                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" name="email" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        @error('password')
                        <label class="col-form-label" for="inputError">
                            <i class="fas fa-times-circle"> </i>{{ $message }}
                        </label>
                        @enderror
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Select Job</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role )
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <button type="reset" class="btn btn-warning"> Reset </button>
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
@endsection