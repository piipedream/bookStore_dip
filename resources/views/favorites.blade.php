@extends('layouts.app')

@section('title-block')Фавориты @endsection

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


  	<div class="container2 tabcontent" id="Favorites">
      @if(session('favorites'))
      <hr class="my-4">
        @foreach(session('favorites') as $id => $details)
          @php $imageURL = $details['image'] @endphp
          <div class="row mb-4 d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
              <img
                src="{{asset("/storage/image/$imageURL")}}"
                class="img-fluid rounded-3" alt="Cotton T-shirt">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
              <h6 class="text-muted">{{$details['author']}}</h6>
              <h6 class="text-black mb-0">{{$details['title']}}</h6>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-1 offset-lg-1">
              <h6 class="mb-0">{{$details['price']}} р.</h6>
            </div>
            <div class="col-md-1 col-lg-1 col-xl-2 text-end">

              <a href="{{route('favorites.remove', $id)}}" class="btn-outline-fav">
                <button type="button" name="button" class="btn btn-outline-dark">Удалить</button>
              </a>
            </div>
          </div>

          <hr class="my-4">
        @endforeach
      @else
        <div class="text-center">
          <p>Список фаворитов сейчас пуст</p>
        </div>
      @endif
  	</div>

</div>
@endsection
