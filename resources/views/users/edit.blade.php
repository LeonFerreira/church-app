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
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="E-mail" value="{{ $user->email }}">
    <input type="password" name="password" placeholder="Password">
    <input type="tel" name="phone" placeholder="Phone" value="{{ $user->phone }}">
    <label for="birthday">Birthday</label>
    <input type="date" name="birthday" placeholder="Brithday" value="{{ $user->birthday }}">
    <input type="text" name="address" placeholder="Address" value="{{ $user->address }}">
    <input type="number" name="address_number" min="0" placeholder="Address Number" value="{{ $user->address_number ?? old('address_number') }}">
    <input type="text" name="complement" placeholder="Complement" value="{{ $user->complement ?? old('complement') }}">
    <label for="baptized">Baptized</label>
    <input type="date" name="baptized" placeholder="Baptized" value="{{ $user->baptized ?? old('baptized') }}">
    <select name="gender">
        @foreach(array_column(\App\Enums\Gender::cases(), 'value') as $option)
            <option @if($option == $user->gender) selected @endif value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <select name="marital_status">
        @foreach(array_column(\App\Enums\MaritalStatus::cases(), 'value') as $option)
            <option @if($option == $user->marital_status) selected @endif value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <button type="submit">Send</button>
</form>

@endsection