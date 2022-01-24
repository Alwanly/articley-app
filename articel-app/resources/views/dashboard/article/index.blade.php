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
                    <li class="breadcrumb-item active">Articles</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@include('layouts.alert');
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Aricles</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Reporter</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Categores</th>
                            <th class="text-center">Editor</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date Create</th>
                            <th class="text-center">Date Publish</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $ar)
                        <tr>
                            <td class="">{{++$loop->index}}</td>
                            <td class="">{{$ar->reporter->name}}</td>
                            <td class="">{{$ar->title}}</td>
                            <td class="">
                                @foreach ($ar->category as $ctg )
                                <span class="badge badge-info">{{$ctg->getCategoryName()}}</span>
                                @endforeach
                            </td>
                            <td class="text-center">{{($ar->editor) ? $ar->editor->name: 'Belum diedit'}}</td>
                            <td class="text-center">
                                <span class="badge {{$ar->status ? 'badge-success' : 'badge-warning'}}">{{$ar->getStatusPublish()}}</span>
                            </td>
                            <td class="text-center">{{$ar->getDateCreate()}}</td>
                            <td class="text-center">{{$ar->getDatePublish()}}</td>
                            <td class="text-center">
                                @if (Helper::getPermission('admin','reporter','editor'))
                                <a class="btn btn-primary btn-sm" href="{{route('dashboard.view.article',['article' => $ar->id])}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                @endif
                                @if (Helper::getPermission('admin'))
                                <a class="btn btn-info btn-sm" href="{{route('dashboard.edit.article',['article' => $ar->id])}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                @endif
                                @if (Helper::getPermission('admin'))
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        {{$articles->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection