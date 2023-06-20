@extends('layouts.app')

@section('title', 'Churches')

@section('content')
<h1>
    Churches list
    (<a href="{{ route('churches.create') }}">+</a>)
</h1>

<form action="{{ route('churches.index') }}" method="get">
    <input type="text" name="search">
    <button>Search</button>
</form>

<ul>
    @foreach ($churches as $church)
    <li>
        {{ $church->name }} - {{ $church->email }}
        | <a href="{{route('churches.edit', $church->id)}}">Edit</a>
        | <a href="{{route('churches.show', $church->id)}}">Details</a>
    </li>
    @endforeach
</ul>
@endsection