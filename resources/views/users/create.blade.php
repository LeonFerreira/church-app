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
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
    <input type="tel" name="phone" placeholder="Phone" value="{{ old('phone') }}">
    <label for="birthday">Birthday</label>
    <input type="date" name="birthday" placeholder="Brithday" value="{{ old('birthday') }}">
    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
    <input type="number" name="address_number" min="0" placeholder="Address Number" value="{{ old('address_number') }}">
    <input type="text" name="complement" placeholder="Complement" value="{{ old('complement') }}">
    <label for="baptized">Baptized</label>
    <input type="date" name="baptized" placeholder="Baptized" value="{{ old('baptized') }}">
    <select name="gender" value="{{ old('gender') }}">
        @foreach(array_column(\App\Enums\Gender::cases(), 'value') as $option)
            <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <select name="marital_status" value="{{ old('marital_status') }}">
        @foreach(array_column(\App\Enums\MaritalStatus::cases(), 'value') as $option)
            <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <button type="submit">Send</button>
</form>

@endsection