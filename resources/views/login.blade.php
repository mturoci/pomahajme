@extends('layouts.base-layout')
@push('styles')<link href="{{ mix('css/login.css') }}" rel="stylesheet">@endpush
@section('content')
  <form method="post" class="login p-2">
    <h2>Prihlásenie</h2>
    @if ($errors->any())
      <div class="login__errors p-1">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif
    @csrf
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required oninvalid="this.setCustomValidity('Pole email je povinné.')" oninput="this.setCustomValidity('')">
    <label for="pass">Heslo</label>
    <input type="password" name="password" id="pass" required oninvalid="this.setCustomValidity('Pole heslo je povinné.')" oninput="this.setCustomValidity('')">
    <button>Prihlásiť sa</button>
  </form>
@endsection