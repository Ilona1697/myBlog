@extends('personal.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Комментарии</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('personal') }}">Главная</a></li>
              <li class="breadcrumb-item active">Комментарии</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- form start -->
            <form action="{{ route('personal.comment.update', $comment->id) }}" method="post" class="w-100">
                @csrf
                @method('PATCH')
                <!-- FORM: POST->MESSAGE -->
                <div class="form-group w-50" >
                  <textarea class="form-control" style="min-height: 150px;" id="message" name="message">{{$comment->message}}</textarea>
                  @error('message')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!-- /FORM: POST->MESSAGE -->

                <!-- FORM: POST->SUBMIT -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Обновить</button>
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
