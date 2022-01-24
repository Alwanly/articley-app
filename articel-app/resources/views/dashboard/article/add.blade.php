@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
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
                <h3 class="card-title">List pf Reporter</h3>
            </div>
            <!-- /.card-header -->

            <form action="{{route('dashboard.store.article')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="blog">Blog</label>
                        <textarea id="blog" name="blog" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="kategori[]"  multiple="multiple" class="form-control  select2 select2-classic">  
                            @foreach ($categories as $ctg )                                
                            <option value="{{$ctg->id}}">{{$ctg->category}}</option>
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
@push('js')


@endpush