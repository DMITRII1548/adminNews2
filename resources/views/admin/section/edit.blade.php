@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Цвета секций Новость</h1>
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
            <form action="{{ route('admin.section.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="text" name="header" placeholder="Цвет меню (HEX)" class="form-control" value="{{ $section->header }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="main" placeholder="Цвет главной части (HEX)" class="form-control" value="{{ $section->main }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="footer" placeholder="Цвет подвала (HEX)" class="form-control" value="{{ $section->footer }}" required>
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
