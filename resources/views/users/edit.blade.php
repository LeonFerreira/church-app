@extends('layouts.app')

@section('title', "Edit User { $user->name }")

@section('content')

<h1>Edit User {{ $user->name }}</h1>

@include('users.includes.validations-form')

<form action="{{ route('users.update', $user->id)}}" method="POST">
    @method('PUT')
    @include('users._partials.form')
</form>

@endsection