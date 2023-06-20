@extends('layouts.app')

@section('title', "Edit Church { $church->name }")

@section('content')

<h1>Edit Church {{ $church->name }}</h1>

@include('churches.includes.validations-form')

<form action="{{ route('churches.update', $church->id)}}" method="POST">
    @method('PUT')
    @include('churches._partials.form')
</form>

@endsection