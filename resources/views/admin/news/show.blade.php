@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Новость</h1>
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
                            <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-primary">Редактировать</a>
                        </div>

                        <form action="{{ route('admin.news.delete', $news->id) }}" method="post" class="ml-3">
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
                            <td>{{ $news->id }}</td>
                        </tr>
                        <tr>
                            <td>Наименование</td>
                            <td>{{ $news->title }}</td>
                        </tr>
                        <tr>
                            <td>Краткое описание</td>
                            <td>{{ $news->description }}</td>
                        </tr>
                        <tr>
                            <td>Превью</td>
                            <td><img src="{{ $news->imageUrl }}" alt="" style="width: 200px"></td>
                        </tr>
                        <tr>
                            <td>Контент</td>
                            <td>{!! $news->content !!}</td>
                        </tr>
                        <tr>
                            <td>До публикации</td>
                            <td>{{ $news->publishBefore > 0 ? $news->publishBefore . ' часов': 'Опубликовано' }}</td>
                        </tr>
                        <tr>
                            <td>Автор:</td>
                            <td>
                                {{ $news->author_name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Просмотры:</td>
                            <td>
                                {{ $news->views }}
                            </td>
                        </tr>
                        <tr>
                            <td>Лайки:</td>
                            <td>
                                {{ $news->likes }}
                            </td>
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
