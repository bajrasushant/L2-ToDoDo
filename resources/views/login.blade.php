@extends('layout')

@section('title', 'ToDODO|login')

@section('content')

<main class="main">
  <div class="container">
    <div class="message">
      @if ($errors->any())
        <div class="error">
          @foreach ($errors->all() as $error)
            <div class="alert">{{$error}}</div>
          @endforeach
        </div>
      @endif

      @if (session()->has('error'))
        <div class="alert">{{session('error')}}</div>
      @endif

      @if (session()->has('success'))
        <div class="alert">{{session('success')}}</div>
      @endif
    </div>
    
    <section class="wrapper">
      <div class="heading">
        <h1>Sign In</h1>
        <p>New user? <span><a href="#">Create an account</a></span>
        </p>
      </div>
      <form action = "{{ route('login.post') }}" method= "POST" class="form">
        @csrf
        <div class="input-control">
          <label for="email" class="input-label" hidden>Email Address</label>
          <input type="email" name="email" id="email" class="input-field" placeholder="Email Address">
        </div>
        <div class="input-control">
          <label for="password" class="input-label" hidden>Password</label>
          <input type="password" name="password" id="password" class="input-field" placeholder="Password">
        </div>
        <div class="input-control">
          <a href="#">Forgot Password</a>
          <input type="submit" name="submit" class="input-submit" value="Sign In">
        </div>
      </form>
    </section>
  </div>
</main>

@endsection