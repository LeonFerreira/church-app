@extends('layouts.app')

@section('title', 'New Chruch')

@section('content')
<h1>New Church</h1>

@include('churches.includes.validations-form')

<form action="{{ route('churches.store') }}" method="POST">
    @csrf
    @include('churches._partials.form')
</form>

@endsection