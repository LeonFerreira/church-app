@extends('layouts.app')

@section('title', 'Novo(a) Usuário(a)')

@section('content')
<h1>New User</h1>

@include('users.includes.validations-form')

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    @include('users._partials.form')
</form>
@endsection