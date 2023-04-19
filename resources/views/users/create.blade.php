@extends('layouts.app')

@section('title', 'Novo(a) Usuário(a)')

@section('content')

<h1>New User</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="class">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    @include('users._partials.form')
</form>

@endsection