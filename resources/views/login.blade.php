@extends('layout')

@section('title', 'ToDODO|login')

@section('content')

<main class="main">
  <div class="container">
    <section class="wrapper">
      <div class="heading">
        <h1>Sign In</h1>
        <p>New user? <span><a href="#">Create an account</a></span>
        </p>
      </div>
      <form action = "#" method= "post" class="form">
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
          <input type="submit" name="submit" class="input-submit" value="Sign In" disabled>
        </div>
      </form>
    </section>
  </div>
</main>