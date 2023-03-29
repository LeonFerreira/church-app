@extends('layouts.app')

@section('title', 'Novo(a) Usuário(a)')

@section('content')

<h1>New User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <input type="tel" name="phone" placeholder="Phone">
    <label for="birthday">Birthday</label>
    <input type="date" name="birthday" placeholder="Brithday">
    <input type="text" name="address" placeholder="Address">
    <input type="number" name="address_number" min="0" placeholder="Address Number">
    <input type="text" name="complement" placeholder="Complement">
    <label for="baptized">Baptized</label>
    <input type="date" name="baptized" placeholder="Baptized">
    <select name="gender">
        @foreach(array_column(\App\Enums\Gender::cases(), 'value') as $option)
            <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <select name="marital_status">
        @foreach(array_column(\App\Enums\MaritalStatus::cases(), 'value') as $option)
            <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <button type="submit">Send</button>
</form>

@endsection