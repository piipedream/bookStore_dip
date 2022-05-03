@extends('layouts.app')

@section('title-block')Регистрация @endsection

@section('content')
<div class="parent_form container">
<div class="form_login">
    @error('emailError')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<form action="{{route('user.signup_save')}}" method="post">
    @csrf

    <h3 class="title_login">Регистрация</h3>

    <div class="form-group mt-3">
        <label for="login" class="mb-2">Логин <span class="required">*</span></label>
        <input type="text" name="login" id="login" class="form-control" pattern="[a-zA-Z]*">
        @error('login')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

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

    <div class="form-group mt-3">
        <label for="password_confirmation" class="mb-2">Подтвердите пароль <span class="required">*</span></label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="align-items-center mb--20 mt-3">
      <div class="form__group">
        <div class="form__group">
          <button type="submit" class="btn btn_log btn-dark">Зарегистрироваться</button>
        </div>
        <label class="form__label_signup checkbox-label" for="store_session">
            <input type="checkbox" name="store_session" id="store_session" checked>
            <span>Согласие на обработку персональных данных</span>
        </label>
      </div>
    </div>
</form>
</div>
</div>
@endsection
