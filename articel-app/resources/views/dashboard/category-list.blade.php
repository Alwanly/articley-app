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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                        Create Category
                    </button>

                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $ar)
                        <tr>
                            <td class="text-center">{{++$loop->index}}</td>
                            <td class="text-center">{{$ar->category}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-category="{{$ar}}" date-type="category" data-target="#modal-edit">
                                    Edit
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="col-8"></div>
                <div class="col-4">
                    {{$categories->links()}}
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
@include('dashboard.category-modal')
@endsection
@push('js')


@endpush