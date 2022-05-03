@extends('layouts.app')

@section('title-block')Главная страница @endsection

@section('content')

<div class="home_img_bg">
  <section class="py-5 container">
    <div class="row py-lg-5">
      <div class="col-lg-8 col-md-8 mb-5 home_head">
        <p class="lead" style="font-weight: 400;">Качественные эксклюзивы по доступным цена</p>
        <h1 class="mb-5">Книжный Онлайн магазин «Book Store»</h1>
        <a href="{{route('books')}}">
          <button type="submit" class="btn btn_home btn-dark">Купить сейчас</button>
        </a>
      </div>
    </div>
  </section>
</div>

<div class="container">

  <div class="container">
    <div class="p-4 p-md-5 mb-4 mt-4 text-white rounded bg-dark home_poster">
    <div class="col-md-6 px-0 bg-dark px-3 py-3">
      <h1 class="display-4 font-italic">«Book Store»</h1>
      <p class="lead my-3">«Book Store» - это интрнет-магазин книг, где ты найдешь много новых фантастических возможностей для путешествия и открытия новых миров.</p>
    </div>
  </div>

  <div class="row mb-4">
    <div class="text-center mt-5 mb-5">
      <h2>Лучшие цитаты</h2>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2">Михаил Булгаков - Мастер и Маргарита</strong>
          <h3 class="mb-0 mt-3">«Вы судите по костюму? Никогда не делайте этого. Вы можете ошибиться, и притом, весьма крупно.»</h3>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="/img/book1_homepage.jpeg" alt="book" width="200" height="300" >
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2">Эрих Мария Ремарк - Триумфальная арка</strong>
          <h3 class="mb-0 mt-3">«Самый легкий характер у циников, самый невыносимый у идеалистов. Вам не кажется это странным?»</h3>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="/img/book2_homepage.jpeg" alt="book" width="200" height="300" >
        </div>
      </div>
    </div>
  </div>
  </div>

  <hr class="my-5">

  <div class="text-center mt-5 mb-5">
    <h2>Популярные писатели</h2>
  </div>

  <div class="container marketing mb-5">
    <div class="row" style="text-align: center;">
      <div class="col-lg-4">
        <img src="/img/authors/author1.png" alt="author" width="140" height="140">
        <h2>Михаил Булгаков</h2>
        <p>Русский писатель, драматург, театральный режиссёр и актёр. Автор повестей, рассказов, фельетонов, пьес, инсценировок, киносценариев и оперных либретто.</p>
      </div>
      <div class="col-lg-4">
        <img src="/img/authors/author2.png" alt="author" width="140" height="140">
        <h2>Джоан Роулинг</h2>
        <p>Английская писательница, пишущая под псевдонимом Джоан Кэтлин Роулинг (Joanne Katheline Rowling), автор серии (1997—2007) романов о Гарри Поттере, переведённых более чем на 60 языков, в том числе и на русский.</p>
      </div>
      <div class="col-lg-4">
        <img src="/img/authors/author3.png" alt="author" width="140" height="140">
        <h2>Джек Лондон</h2>
        <p>Джек Лондон (урождённый Джон Гриффит Чейни) — американский писатель, наиболее известный как автор приключенческих рассказов и романов.</p>
      </div>
    </div>
  </div>

</div>
@endsection
