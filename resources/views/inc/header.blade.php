<header>
  <div class="navbar navbar-light">
    <div class="container">
      <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
        <img src="/img/logo.png" alt="logo" class="mr-5 width="30" height="30"">
        <strong style="margin-left: 5px;">bookStore</strong>
      </a>
      <nav class="nav_header">
          <a class="me-3 py-2 text-black text-decoration-none" href="{{route('home')}}">Главная страница</a>
          <a class="me-3 py-2 text-black text-decoration-none" href="{{route('books')}}">Книги</a>
      </nav>

      @if (Auth::check())
      <div class="">
          <a href="{{route('userpage')}}">
            <span>Личный кабинет</span>
          </a>
          <a href="{{route('cart.list')}}" class="me-2 ms-1 img_cart">
            <img src="/img/icons/bag.png" alt="cart">
          </a>
          <!-- <a href="{{ route('user.logout') }}" class="btn btn-outline-dark me-2">Выход</a> -->
      </div>
      @else
      <div class="registr_btn">
          <a href="{{route('user.login')}}" class="btn btn_1 me-2">Вход</a>
          <a href="{{route('user.signup')}}"  class="btn btn_2 me-2">Регистрация</a>
      </div>
      @endif
    </div>
  </div>
</header>
