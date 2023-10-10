@extends('layout')

@section('title', 'ToDODO|Dashboard')
@section('scripts')
		<script type="module" src="{{ asset('js/sidebar/controller.js') }}" defer></script>
@endsection
<!-- TODO: add container div -->
@section('content')
<div class='app'>
    @include('sidebar')
<main class='project'>
</main>
</div>
@endsection
