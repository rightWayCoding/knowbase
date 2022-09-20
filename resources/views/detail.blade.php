@extends('layouts.base')

@section('title', $note->title)

@section('main')
<div class="container">
    <h2>{{ $note->title }}</h2>
    <p>{{ $note->content }}</p>
    <p>{{ $note->price }}</p>
    <p>Автор: {{ $note->user->name }}</p>
    <p><a href="{{ route('index') }}">На перечень заметок</a></p>
</div>
@endsection('main')