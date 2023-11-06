@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Тег</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Главная</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <div>
                            <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-primary">Редактировать</a>
                        </div>

                        <form action="{{ route('admin.tag.delete', $tag->id) }}" method="post" class="ml-3">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $tag->id }}</td>
                        </tr>
                        <tr>
                            <td>Наименование</td>
                            <td>{{ $tag->title }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>

                </div>

                </div>
          </div>
          <!-- /.row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
