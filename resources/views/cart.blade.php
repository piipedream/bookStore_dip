@extends('layouts.app')

@section('title-block')Корзина @endsection

@section('content')

<div class="container">

<section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Корзина</h1>
                  </div>
                  @php $totalPrice = 0; $totalAm = 0; @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $totalPrice += $details['price'] * $details['quantity'] @endphp
                            @php $totalAm++ @endphp
                            @php $imageURL = $details['image'] @endphp
                            <hr class="my-4">

                            <div class="row mb-4 d-flex justify-content-between align-items-center input_parent" data-id={{$id}}>
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                <img
                                  src="{{asset("/storage/image/$imageURL")}}"
                                  class="img-fluid rounded-3" alt="Cotton T-shirt">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="text-muted">{{$details['author']}}</h6>
                                <h6 class="text-black mb-0">{{$details['title']}}</h6>
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <input id="form1" min="0" name="quantity" value="{{$details['quantity']}}" type="number" class="form-control form-control-sm quantity update-cart" />
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">{{$details['price']}} р.</h6>
                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="{{route('cart.remove', $id)}}" class="text-muted remove-from-cart">
                                  <button type="button" class="btn-close" aria-label="Close"></button>
                                </a>
                              </div>
                            </div>
                        @endforeach
                    @else
                    <div class="">
                      <p>Вы пока не добавили книги в корзину</p>
                    </div>
                    @endif

                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0">
                      <a href="{{route('books')}}" class="text-body">
                        <i class="fas fa-long-arrow-alt-left me-2"></i>
                        Вернуться в магазин
                      </a>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Итог</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Количество: {{$totalAm}}</h5>
                    <h5><span id="totalPrice">{{$totalPrice}}</span> руб.</h5>
                  </div>

                  @if (session('cart'))
                  <form action="{{route('checkout')}}" method="post">
                    @csrf
                    <h5 class="text-uppercase mb-3">Доставка</h5>

                    <div class="mb-4 pb-2">
                      <select name="delivery_select" id="delivery_select" class="select form-control form-control-lg">
                        <option value="300">Стандартная доставка - 300 руб.</option>
                        <option value="1000">Экспресс доставка - 1000 руб.</option>
                      </select>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Всего</h5>
                      <h5><span id="totalAll">{{$totalPrice}}</span> руб.</h5>
                    </div>

                    <button type="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">
                      Оформить заказ
                    </button>
                  </form>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</div>

<script>
  $total = parseInt($('#totalPrice').html()) + parseInt($('#delivery_select').val());
  $('#totalAll').text($total);
  $('#delivery_select').change(function () {
    $total = parseInt($('#totalPrice').html()) + parseInt($('#delivery_select').val());
    $('#totalAll').text($total);
  });

  $(".update-cart").change(function (e){
    e.preventDefault();
    var ele = $(this);
    $.ajax({
      url: '{{route('cart.update')}}',
      method: "patch",
      data: {
        _token: '{{csrf_token()}}',
        id: ele.parents(".input_parent").attr("data-id"),
        quantity: ele.parents("div").find(".quantity").val()
      },
      success: function (response){
        window.location.reload();
      }
    });
  });

</script>

@endsection
