@extends('layouts.app')

@section('title-block')Оформление заказа @endsection

@section('content')
  <div class="container py-5" style="width: 900px;">
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Ваша корзина</span>
        </h4>
        <ul class="list-group mb-3">
          @php $totalPrice = 0 @endphp
          @if(session('cart'))
              @foreach(session('cart') as $id => $details)
                  @php $totalPrice += $details['price'] * $details['quantity'] @endphp
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">{{$details['author']}}</h6>
                      <small class="text-muted">{{$details['title']}}</small>
                    </div>
                    <span class="text-muted">{{$details['quantity']}}</span>

                    <span class="text-muted">{{$details['price']}} р.</span>
                  </li>
              @endforeach
          @endif
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Доставка</h6>
            </div>


            <span class="text-muted">{{$delivery}} р.</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Всего</span>
            <strong>{{$totalPrice + $delivery}} р.</strong>
          </li>
        </ul>
      </div>

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Адрес для выставления счета</h4>
        <form class="needs-validation" action="{{route('makeOrder', $delivery)}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Имя</label>
              <input type="text" class="form-control" name="name" id="firstName" required>
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Фамилия</label>
              <input type="text" class="form-control" name="last_name" id="lastName" required>
              @error('last_name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Логин</label>
            <div class="input-group">
              <input type="text" class="form-control" name="login" value="{{Auth::user()->login}}" id="username" required>
              @error('login')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="address">Адрес</label>
            <input type="text" class="form-control" name="address" id="address" required>
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Страна</label>
              <input type="text" class="form-control" name="country" id="country" required>
              @error('country')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label for="city">Город</label>
              <input type="text" class="form-control" name="city" id="city" required>
              @error('city')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip_code">Индекс</label>
              <input type="text" class="form-control" name="zip_code" id="zip" required\>
              @error('zip_code')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <hr class="mb-4">

          <h4 class="mb-3">Оплата</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
              <label class="custom-control-label" for="credit">Онлайн оплата</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="debit">Оплата при получении</label>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-dark btn-lg btn-block" type="submit">Заказать</button>
        </form>
      </div>
    </div>
  </div>
@endsection
