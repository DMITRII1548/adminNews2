@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавить Новость</h1>
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
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" placeholder="Заголовок" class="form-control" required>
                </div>

                <div class="form-group">
                    <textarea type="text" name="description" placeholder="Краткое описание" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile" enctype="multipart/form-data" required>
                        <label class="custom-file-label" for="exampleInputFile">Выберете файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea id="summernote" name="content" required></textarea>
                </div>

                <div class="form-group">
                    <label>Дата создания:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="datetime-local" name="created_at" class="form-control">
                      </div>
                </div>

                <div class="form-group">
                    <label>Дата публикации:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="publish_date" class="form-control">
                      </div>
                </div>

                <div class="form-group">
                    <input type="text" name="author_name" placeholder="Имя автора" class="form-control" required>
                </div>

                <div class="form-group">
                    <select class="tags" name="tags[]" multiple="multiple" data-placeholder="Выберети теги" style="width: 100%;">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Добавить</button>
                 </div>
            </form>
          </div>
          <!-- /.row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
