@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Изменеить аккаунт</h1>
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
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <input type="password" name="new_password" placeholder="Новый пароль" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" name="old_password" placeholder="Старый пароль" class="form-control" required>
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
