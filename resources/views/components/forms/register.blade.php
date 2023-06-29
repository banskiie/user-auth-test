@extends('pages.home')

@section('current')
<div class="w-screen grid place-items-center pt-24">
  @if(\Session::has('message'))
  <div>
    {{\Session::get('message')}}
  </div>
  @endif
  <form method="post" action="{{route('postregister')}}"
    class="form-control p-8 px-16 shadow-2xl rounded-3xl border border-solid grid place-items-center gap-3">
    @csrf
    <h1 class="text-3xl font-bold uppercase">Register</h1>
    <div class="form-control w-full max-w-xs">
      <label class="label">
        <span class="label-text">Name</span>
      </label>
      <input type="text" id="name" name="name" placeholder="Enter your name"
        class="input input-bordered w-full max-w-xs" />
      @if ($errors->has('name'))
      <span class="text-warning">{{$errors->first('name')}}</span>
      @endif
    </div>
    <div class="form-control w-full max-w-xs">
      <label class="label">
        <span class="label-text">Email</span>
      </label>
      <input type="email" id="email" name="email" placeholder="Enter email"
        class="input input-bordered w-full max-w-xs" />
      @if ($errors->has('email'))
      <span class="text-warning">{{$errors->first('email')}}</span>
      @endif
    </div>
    <div class="form-control w-full max-w-xs">
      <label class="label">
        <span class="label-text">Password</span>
      </label>
      <input type="password" id="password" name="password" placeholder="•••••••••••"
        class="input input-bordered w-full max-w-xs" />
      @if ($errors->has('password'))
      <span class="text-warning">{{$errors->first('password')}}</span>
      @endif
    </div>
    <button class="btn">Register</button>
    <a href="{{route('login')}}" class="link">Already a user?</a>
  </form>
</div>
@endsection