@extends('layouts.app')

@section('title', 'Church List')

@section('content')
<h1>Church List: {{$church->name}}</h1>

<ul>
    <li>{{$church->name}}</li>
    <li>{{$church->address}}</li>
    <li>{{$church->address_number}}</li>
</ul>

<form action="{{ route('churches.destroy', $church->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">Delete</button>
</form>
@endsection