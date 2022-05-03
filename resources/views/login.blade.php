@extends('layouts.app')

@section('title-block')Вход @endsection

@section('content')
<div class="parent_form container">
<div class="form_login_book">
<form action="{{route('user.login')}}" method="post">
    @csrf

    <h3 class="title_login">Вход</h3>
    <div class="form-group mt-3">
        <label for="email" class="mb-2">Email <span class="required">*</span></label>
        <input type="text" name="email" id="email" class="form-control">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="password" class="mb-2">Пароль <span class="required">*</span></label>
        <input type="password" name="password" id="password" class="form-control">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="btn_login d-flex align-items-center mb--20 mt-3">
      <div class="form__group mr--30">
        <button type="submit" class="btn btn_log btn-dark">Войти</button>
      </div>
    </div>
</form>
</div>
</div>
@endsection
