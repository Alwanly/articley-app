@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.list.article')}}">Articles</a></li>
                    <li class="breadcrumb-item active">View Article</li>
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
                <h3 class="card-title">List pf Reporter</h3>
            </div>
            <!-- /.card-header -->

            <form action="{{route('dashboard.update.article',['article'=>$article->id])}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Date Create</label>
                        <input type="text" id="reporter" name="reporter" readonly class="form-control" value="{{$article->getDateCreate()}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Reporter</label>
                        <input type="text" id="reporter" name="reporter" readonly class="form-control" value="{{$article->reporter->name}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="blog">Blog</label>
                        <textarea id="blog" name="blog" class="form-control" rows="10">{{$article->blog}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="kategori[]" disabled multiple="multiple" class="form-control  select2 select2-classic">
                            @foreach ($categoriesAr as $ctg )
                            <option selected value="{{$ctg}}">{{$ctg->getCategoryName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editor">Editor</label>
                        <input type="text" id="reporter" name="reporter" readonly class="form-control" value="{{$article->getEditorName()}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" name="submit" value="save_publish" class="btn btn-warning btn-block"> Save & Publish </button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="submit" value="save" class="btn btn-success  btn-block"> Save </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('js')


@endpush