
  <nav class="my-navbar">
    <ul class="nav-links">
      <li class="nav-link"><a href="/">Home</a></li>
      <li class="nav-link"><a href="/portfolio">Portfolio</a></li>
      <li class="nav-link"><a href="/posts">Blog</a></li>
      <li class="nav-link"><a href="/contact">Contact</a></li>
      @if(Auth::check())
        <li class="nav-link"><a href="/posts/create">Create a Post</a></li>
        <li class="nav-link"><a href="/dashboard">Dashboard</a></li>
        <li class="nav-link"><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a></li>
        <p class="nav-link">{{ auth()->user()->name }}</p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <li class="nav-link"><a href="/login">Login</a></li>
      @endif    

  </nav>