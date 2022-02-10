@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
              <li class="breadcrumb-item active">Добавление поста</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
                  <!-- form start -->
                  <form action="{{ route('admin.post.store') }}" method="post" class="w-100" enctype="multipart/form-data">
                      @csrf
                      <!-- FORM: POST->TITLE -->
                      <div class="form-group w-25">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Название поста" value="{{old('title')}}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: POST->TITLE -->

                      <!-- FORM: POST->CONTENT -->
                      <div class="form-group w-100">
                        <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                        @error('content')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- FORM: POST->CONTENT -->

                      <!-- FORM: POST->PREVIEW_IMAGE -->
                      <div class="form-group w-50">
                        <label>Добавить превью</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="preview_image">
                            
                            <label class="custom-file-label">Выберите изображение</label>
                          </div>
                        </div>
                        @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: POST->PREVIEW_IMAGE -->

                      <!-- FORM: POST->MAIN_IMAGE -->
                      <div class="form-group w-50">
                        <label>Добавить главное изображение</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="main_image">
                            
                            <label class="custom-file-label">Выберите изображение</label>
                          </div>
                        </div>
                        @error('main_image')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: POST->MAIN_IMAGE -->

                      <!-- FORM: POST->CATEGORY -->
                      <div class="form-group">
                        <label>Категории</label>
                        <select class="form-control" name="category_id">
                          <option  selected disabled>Выберите категорию</option>
                          @foreach($categories as $category)
                            <option  value="{{ $category->id }}" 
                              {{ $category->id == old('category_id') ? 'selected' : '' }}
                            >{{ $category->title }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: POST->CATEGORY -->

                      <!-- FORM: POST->TAG -->
                      <div class="form-group">
                        <label>Тэги</label>
                        <select class="form-control select2 w-100" name="tag_ids[]"  multiple="multiple" data-placeholder="Выберите тэги">
                          @foreach($tags as $tag)
                            <option {{ is_array( old('tag_ids') ) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} 
                              value="{{ $tag->id }}">{{ $tag->title }}</option>
                          @endforeach
                        </select>
                        @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: POST->TAG -->

                      <!-- FORM: POST->SUBMIT -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                      </div>
                      <!-- /FORM: POST->SUBMIT -->
                  </form><!-- /.form -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
