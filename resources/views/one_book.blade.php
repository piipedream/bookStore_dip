@extends('layouts.app')

@section('title-block'){{$data->title}} - {{$data->author}} @endsection

@section('content')

<div class="container">
  <div class="container parent_form_book">
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
  </div>
  <div class="one_book mt-5 mb-5">
    <div class="oneBook_img">
      <img src="{{asset("/storage/image/$data->image")}}" alt="book">
    </div>

    <div class="oneBook_info">
      <div>
        <h6 class="mb-4">
          <a href="{{route('books')}}" class="text-body">
            <i class="fas fa-long-arrow-alt-left me-2"></i>
            Вернуться в магазин
          </a>
        </h6>
      </div>

      <div class="name_book">
        <h1>{{$data->title}}</h1>
        <p>{{$data->author}}</p>
      </div>
      <p class="one_book_price">{{$data->price}} руб.</p>
      <div class="oneBook_btn">
        <form action="{{route('cart.store', $data->id)}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-dark">В корзину</button>
        </form>
        <a href="{{route('favorites.store', $data->id)}}" class="btn_fav_heart">
          &#9825;
        </a>
      </div>
      @can('admin')
      <div class="oneBook_btn">
        <a href="{{route('edit_book', $data->id)}}" class="edit_one_book">
          <button type="submit" class="btn btn-outline-dark">Редактировать</button>
        </a>
        <a href="{{route('delete_book', $data->id)}}">
          <button type="submit" class="btn btn-outline-dark">Удалить</button>
        </a>
      </div>
      @endcan
      <div class="book_description">

        <div class="book_inf_footer">
          <span>Жанр: {{$data->genre}}</span>
          <br>
          <span>Страна: {{$data->country}}</span>
          <br>
          <span>Количество страниц: {{$data->pages}}</span>
        </div>
      </div>
    </div>
  </div>


<!-- /////////tab//////// -->

<div class="tabset container">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
  <label for="tab1">О товаре</label>
  <!-- Tab 2 -->
  <!-- <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
  <label for="tab2">Отзывы</label> -->

  <div class="tab-panels">
    <section id="marzen" class="tab-panel">
      <div class="">
        <h5 class="mb-3">Аннотация</h5>
        <p>{{$data->description}}</p>
      </div>
    </section>
    <section id="rauchbier" class="tab-panel">

      <label for="pseudoBtn" class="btn btn_review mb-3">Написать отзыв</label>
      <input type="checkbox" id="pseudoBtn">
      <div class="text form_review mb-5">
        <form class="" action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="review" class="mb-2">Отзыв</label>
            <textarea name="review" id="review" rows="5" class="form-control"></textarea>
            @error('review')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mt-3">
              <button type="submit" class="btn btn-outline-dark">Опубликовать отзыв</button>

          </div>
        </form>
      </div>

      <div class="d-flex mb-5">
        <div class="reviews_username">
          <span>user_login</span>
          <br>
          <span class="text-muted">created_at</span>
        </div>
        <div>
          Книга действительно очень хорошая .Хоть я и не нашла героев близких по духу ,у меня не было симпатии ни к одному герою ,но история очень поучительная .Нужно было либо бороться за своё счастье ,либо отпустить друг друга,чего не сделали Кэтрин и Хитклиф. Поэтому все закончилось печально.
        </div>
      </div>
    </section>
  </div>

</div>
<!-- /////////end tab//////// -->

</div>

@endsection
