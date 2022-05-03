@extends('layouts.app')

@section('title-block')Книги @endsection

@section('content')
<div class="books_img_bg">
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto text-white">
        <p>Книги на любой вкус</p>
        <h1>Каталог товаров</h1>
      </div>
    </div>
  </section>
</div>

<div class="container">
  <form class="" action="{{ route('search') }}" method="get">

    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-6">
          <div class="form">
            <i class="fa fa-search"></i>
              <input type="text" class="form-control form-input shadow " placeholder="search book" name="s" id="s">
          </div>
        </div>
    </div>
  </form>
</div>

<div class="container">

  <div class="container parent_form_book">
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
  </div>

  <div class="books_bestsellers">
    @foreach($data as $el)
    <div class="card card_onebook" style="width: 18rem;">
      <a href="{{route('one_book', $el->id)}}" class="books_covers">
        <img src="{{asset("/storage/image/$el->image")}}" alt="book">
      </a>
      <div class="card-body card_description">
        <div class="card_bookname">
          <a href="{{route('one_book', $el->id)}}">
            <h5 class="card-title">{{$el->title}}</h5>
          </a>
          <a href="{{route('one_book', $el->id)}}">
            <p class="card-text">{{$el->author}}</p>
          </a>
        </div>
        <div class="price">
          <a href="{{route('one_book', $el->id)}}" class="">
            <button type="button" class="btn btn-outline-dark btn_addcart">Купить сейчас</button>
          </a>
          <p>{{$el->price}} р.</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="pagination justify-content-center align-items-center mb-4 mt-3">
    {{$data->links()}}
  </div>

</div>
@endsection
