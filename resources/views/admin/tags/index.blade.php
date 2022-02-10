@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Тэги</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
              <li class="breadcrumb-item active">Тэги</li>
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
        <div class="row mb-3 col-12">
          <div>
            <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-primary">Создать</a>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-8">
          <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Название</th>
                      <th class="text-center" colspan="3">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tags as $tag)
                      <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->title }}</td>
                        <td><a href="{{ route('admin.tag.show', $tag->id)}}"><i class="fas fa-eye text-primary"></i></a></td>
                        <td><a href="{{ route('admin.tag.edit', $tag->id)}}" class="text-success"><i class="fas fa-pen"></i></a></td>
                        <td>
                          <form action="{{ route('admin.tag.delete', $tag->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                              <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                              
                          </form>
                          
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
