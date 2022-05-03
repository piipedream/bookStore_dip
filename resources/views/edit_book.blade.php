@extends('layouts.app')

@section('title-block')Редактировать книгу @endsection

@section('content')
<div class="container">

   <div class="container3 tabcontent" id="add_book">
      <div class="parent_form_book container">

      <div class="form_login_book">
      <form action="{{route('edit_book_submit', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf

          <div class="form-group mt-3">
              <label for="title" class="mb-2">Название книги <span class="required">*</span></label>
              <input type="text" name="title" id="title" value="{{$data->title}}" class="form-control">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group mt-3">
              <label for="author" class="mb-2">Автор <span class="required">*</span></label>
              <input type="text" name="author" id="author" value="{{$data->author}}" class="form-control">
              @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="mt-3 form-group">
            <label for="description" class="mb-2">Описание <span class="required">*</span></label>
            <textarea name="description" id="description" rows="10" class="form-control">{{$data->description}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="row">
            <div class="form-group mt-3 col-md-4 mb-3">
                <label for="genre" class="mb-2">Жанр <span class="required">*</span></label>
                <input type="text" name="genre" id="genre" value="{{$data->genre}}" class="form-control">
                @error('genre')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3 col-md-4 mb-3">
                <label for="country" class="mb-2">Страна <span class="required">*</span></label>
                <input type="text" name="country" id="country" value="{{$data->country}}" class="form-control">
                @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3 col-md-4 mb-3">
                <label for="pages" class="mb-2">Количество страниц <span class="required">*</span></label>
                <input type="text" name="pages" id="pages" value="{{$data->pages}}" class="form-control">
                @error('pages')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>

          <div class="form-group mt-2 col-md-2 mb-3">
              <label for="price" class="mb-2">Цена <span class="required">*</span></label>
              <input type="text" name="price" id="price" value="{{$data->price}}" class="form-control">
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group mt-4 mb-4">
            <input type="file" class="form-control-file" id="image" name="image" value="{{$data->image}}">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="btn_login d-flex align-items-center mb--20 mt-3">
            <div class="form__group mr--30">
              <button type="submit" class="btn btn_log btn-dark">Обновить книгу</button>
            </div>
          </div>
      </form>
      </div>
      </div>
   </div>


</div>
@endsection
