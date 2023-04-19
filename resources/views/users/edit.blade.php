@extends('layouts.app')

@section('title', "Edit User { $user->name }")

@section('content')

<h1>Edit User {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="class">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user->id)}}" method="POST">
    @method('PUT')
    @include('users._partials.form')
</form>

@endsection