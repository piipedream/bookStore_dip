@extends('layouts.app')

@section('title-block'){{Auth::user()->login}} @endsection

@section('content')

<div class="container">

    <div class="col-md-6 mt-5 userpage_inf">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h5 class="mb-3">Логин: {{Auth::user()->login}}</h5>
          <h5 class="mb-3">Почиа: {{Auth::user()->email}}</h5>
          <a href="{{ route('user.logout') }}" class="btn btn-outline-dark me-2" style="width: 190px;">Выйти из аккаунта</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="/img/userpage_inf.jpg" alt="book" width="250" height="300" >
        </div>
      </div>
    </div>

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

</div>

@endsection
