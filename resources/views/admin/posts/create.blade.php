@extends('admin.layouts.base')

@section('title')@parent New Post @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Статьи</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Новая статья</h3>
                    </div>
                    <!-- /.card-header -->

                    <form role="form" method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data"> <!-- для корректной отправки файлов на сервер -->
                        @csrf
                        <div class="card-body">
                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title" value="{{ old('title') }}"" 
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Название">
                            </div>
                            <!-- Description -->
                            <div class="form-group">
                                <label for="description" >Цитата</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"  name="description" id="description" rows="3" value="{{ old('description') }}" placeholder="Цитата ..."></textarea>
                            </div>
                            <!-- Content -->
                            <div class="form-group">
                                <label for="content" >Содержание</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"  rows="5" value="{{ old('content') }}"placeholder="Содержание ..."></textarea>
                            </div>
                            <!-- Category -->
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                                </select>
                            </div>
                            <!-- Tags -->
                            <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                            data-placeholder="Выбор тегов" style="width: 100%; ">
                                        @foreach($tags as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <!-- Thumbnail -->
                            <div class="form-group">
                                <label for="thumbnail">Выбрать изображение</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection