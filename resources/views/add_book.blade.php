@extends('layouts.app')

@section('title-block')Добавить книгу @endsection

@section('content')
<div class="container">

  <div class="nav_bar mt-5 mb-5 row">

    <div class="col-md-2">
      <div class="row g-0 overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative" id="test">
        <div class="block-style">
          <div class="col p-4 d-flex flex-column position-static align-items-center">
            <span>
              <button class="tablinks"  id="defaultOpen">
                <img src="/img/icons/orders.png" alt="shopping_bag">
                <br>
                <a href="{{route('orders')}}" class="stretched-link">Мои заказы</a>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>

    @can('admin')
    <div class="col-md-2">
      <div class="row g-0 overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative" id="test">
        <div class="block-style">
          <div class="col p-4 d-flex flex-column position-static align-items-center">
            <span>
              <button class="tablinks"  id="defaultOpen">
                <img src="/img/icons/orders.png" alt="shopping_bag">
                <br>
                <a href="{{route('all_orders')}}" class="stretched-link">Все заказы</a>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>
    @endcan

    <div class="col-md-2">
      <div class="row g-0 overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative" id="test">
        <div class="block-style">
          <div class="col p-4 d-flex flex-column position-static align-items-center">
            <span>
              <button class="tablinks"  id="defaultOpen">
                <img src="/img/icons/heart.png" alt="shopping_bag">
                <br>
                <a href="{{route('favorites.fav_list')}}" class="stretched-link">Фавориты</a>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>

    @can('admin')
    <div class="col-md-2">
      <div class="row g-0 overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative" id="test">
        <div class="block-style">
          <div class="col p-4 d-flex flex-column position-static align-items-center">
            <span>
              <button class="tablinks"  id="defaultOpen">
                <img src="/img/icons/book.png" alt="shopping_bag">
                <br>
                <a href="{{route('add_book')}}" class="stretched-link">Добавить книгу</a>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>
    @endcan
  </div>


  	<div class="container3 tabcontent" id="add_book">
      <div class="parent_form_book container">

        @if(session('success'))
          <div class="alert alert-success" style="width: 350px;">
            {{session('success')}}
          </div>
        @endif

      <div class="form_login_book">
      <form action="{{route('user.AddBook')}}" method="post" enctype="multipart/form-data">
        @csrf

          <div class="form-group mt-3">
              <label for="title" class="mb-2">Название книги <span class="required">*</span></label>
              <input type="text" name="title" id="title" class="form-control">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group mt-3">
              <label for="author" class="mb-2">Автор <span class="required">*</span></label>
              <input type="text" name="author" id="author" class="form-control">
              @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="mt-3 form-group">
            <label for="description" class="mb-2">Описание <span class="required">*</span></label>
            <textarea name="description" id="description" rows="10" class="form-control"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="row">
            <div class="form-group mt-3 col-md-4 mb-3">
                <label for="genre" class="mb-2">Жанр <span class="required">*</span></label>
                <input type="text" name="genre" id="genre" class="form-control">
                @error('genre')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3 col-md-4 mb-3">
                <label for="country" class="mb-2">Страна <span class="required">*</span></label>
                <input type="text" name="country" id="country" class="form-control">
                @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3 col-md-4 mb-3">
                <label for="pages" class="mb-2">Страницы <span class="required">*</span></label>
                <input type="number" name="pages" id="pages" class="form-control">
                @error('pages')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>

          <div class="form-group mt-2 col-md-3 mb-3">
              <label for="price" class="mb-2">Цена <span class="required">*</span></label>
              <input type="number" name="price" id="price" class="form-control">
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group mt-4 mb-4">
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="btn_login d-flex align-items-center mb--20 mt-3">
            <div class="form__group mr--30">
              <button type="submit" class="btn btn_log btn-dark">Добавить книгу</button>
            </div>
          </div>
      </form>
      </div>
      </div>
  	</div>

</div>
@endsection
