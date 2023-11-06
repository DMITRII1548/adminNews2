@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Цвета секций</h1>
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
                            <a href="{{ route('admin.section.edit') }}" class="btn btn-primary">Редактировать</a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <tbody>
                        <tr>
                            <td>Меню</td>
                            <td><div style="width: 20px; height: 20px; border: 1px solid black; background: {{ $section->header }}"></div></td>
                        </tr>
                        <tr>
                            <td>Оснавная часть</td>
                            <td><div style="width: 20px; height: 20px; border: 1px solid black; background: {{ $section->main }}"></div></td>
                        </tr>
                        <tr>
                            <td>Подвал</td>
                            <td><div style="width: 20px; height: 20px; border: 1px solid black; background: {{ $section->footer }}"></div></td>
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
