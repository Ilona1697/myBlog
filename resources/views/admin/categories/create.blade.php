@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление категории</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
              <li class="breadcrumb-item active">Добавление категории</li>
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
                  <form action="{{ route('admin.category.store') }}" method="post" class="w-25">
                      @csrf
                       <!-- FORM: CATEGORY->TITLE -->
                      <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Название категории">
                        @error('title')
                            <div class="text-danger">Это поле необходимо для заполнения</div>
                        @enderror
                      </div>
                      <!-- /FORM: CATEGORY->TITLE -->

                      <!-- FORM: CATEGORY->SUBMIT -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                      </div>
                      <!-- /FORM: CATEGORY->SUBMIT -->
                  </form><!-- /.form -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
