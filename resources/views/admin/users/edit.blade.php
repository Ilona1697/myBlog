@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование пользователя</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
              <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                  <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="w-25">
                      @csrf
                      @method('PATCH')
                      <!-- FORM: User->Name -->
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Имя пользователя" value="{{$user->name}}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: User->Name -->

                      <!-- FORM: User->Email -->
                      <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Введите email" value="{{$user->email}}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: User->Email -->

                      <!-- FORM: User->ROLE -->
                      <div class="form-group">
                        <select class="form-control" name="role">
                          <option  selected disabled>Выберите роль</option>
                          @foreach($roles as $id => $role)
                            <option  value="{{ $id }}" 
                              {{ $id == $user->role ? 'selected' : '' }}
                            >{{ $role }}</option>
                          @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- /FORM: User->ROLE -->

                      <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                      </div>
                      <!-- FORM: User->SUBMIT -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                      </div>
                      <!-- /FORM: User->SUBMIT -->
                  </form><!-- /.form -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
