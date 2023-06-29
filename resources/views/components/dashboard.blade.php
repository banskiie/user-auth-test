@extends('pages.home')

@section('current')

<p>
<h3>Hello : {{ Auth::user()->name }} </h3>
</p>

@endsection