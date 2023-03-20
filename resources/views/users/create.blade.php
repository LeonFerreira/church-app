@extends('layouts.app')

@section('title', 'Novo(a) Usuário(a)')

@section('content')
<h1>Novo(a) Usuário(a)</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome:">
    <input type="email" name="email" placeholder="E-mail:">
    <input type="password" name="password" placeholder="Password:">
    <button type="submit">Send</button>
</form>

@endsection