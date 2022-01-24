@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
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
                <h3 class="card-title">List of Reporter</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Publish</th>
                            <th>Articles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $reporters as $reporter )
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$reporter->name}}</td>
                            <td>{{$reporter->email}}</td>
                            <td>{{$reporter->totalPublish()}}</td>
                            <td>{{$reporter->totalArticle()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection