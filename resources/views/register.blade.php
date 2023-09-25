@extends('layout')

@section('title', 'ToDODO|register')

@section('content')

<main class="main">
  <div class="container">
    <section class="wrapper">
      <div class="heading">
        <h1>Register a new account</h1>
        <p>Already have an account? <span><a href="#">Sign in</a></span>
        </p>
      </div>
      <form action = "#" method= "post" class="form">
        <div class="input-control">
          <label for="name" class="input-label" hidden>Name</label>
          <input type="text" name="username" placeholder="Username" id="usernameField" class="input-field"/>
        </div>

        <div class="input-control">
          <label for="email" class="input-label" hidden>Email Address</label>
          <input type="email" name="email" id="emailField" class="input-field" placeholder="Email Address">
        </div>

        <div class="input-control">
          <label for="password" class="input-label" hidden>Password</label>
          <input type="password" name="password" id="passwordField" class="input-field" placeholder="Password">
        </div>

        <div class="input-control">
          <label for="repeatPassword" class="input-label" hidden>Repeat Password</label>
          <input type="password" name="repeatpassword" id="repeatPasswordField" class="input-field" placeholder="Repeat Password">
        </div>

        <div class="input-signup">
          <input type="submit" name="submit" class="input-submit" value="Sign Up" disabled>
        </div>
      </form>
    </section>
  </div>
</main>