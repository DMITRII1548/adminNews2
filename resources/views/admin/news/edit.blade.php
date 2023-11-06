@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактировать Новость</h1>
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
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="text" name="title" placeholder="Заголовок" class="form-control" value="{{ old('title') ?? $news->title }}" required>
                </div>

                <div class="form-group">
                    <textarea type="text" name="description" placeholder="Краткое описание" class="form-control" required>{{ old('description') ?? $news->description }}</textarea>
                </div>

                <div class="form-group">
                    <img src="{{ $news->imageUrl }}" alt="" style="width: 100px" class="mb-3">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile" enctype="multipart/form-data">
                        <label class="custom-file-label" for="exampleInputFile">Выберете файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea id="summernote" name="content" required>{{ old('content') ?? $news->content }}</textarea>
                </div>

                <div class="form-group">
                    <label>Дата создания:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="datetime-local" name="created_at" class="form-control" value="{{ old('created_at') ?? $news->created_at }}">
                          {{-- <input type="text" name="publish_date" type="date" placeholder="dd/mm/yyyy" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div> --}}
                      </div>
                </div>

                <div class="form-group">
                    <label>Дата публикации:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="publish_date" class="form-control" value="{{ old('publish_date') ?? $news->publish_date }}">
                          {{-- <input type="text" name="publish_date" type="date" placeholder="dd/mm/yyyy" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div> --}}
                      </div>
                </div>

                <div class="form-group">
                    <input type="text" name="author_name" placeholder="Имя автора" class="form-control" value="{{ old('publish_date') ?? $news->author_name }}" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Изменить</button>
                 </div>
            </form>
          </div>
          <!-- /.row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
