<div class="navbar bg-slate-800 text-white">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl" href="/">Example</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      @guest
      <li><a href="{{route('login')}}">Login</a></li>
      <li><a href="{{route('register')}}">Register</a></li>
      @else
      <li><a href="{{route('signout')}}">Sign out</a></li>
      @endguest
    </ul>
  </div>
</div>