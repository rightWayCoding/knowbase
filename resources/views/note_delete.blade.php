@extends('layouts.base')

@section('title', $note->title)

@section('main')
<div class="container">
    <h2>{{ $note->title }}</h2>
    <p>{{ $note->content }}</p>
    <p>{{ $note->price }}</p>
    <p>Автор: {{ $note->user->name }}</p>
    <form action="{{ route('note.destroy', ['note'=>$note->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>
</div>
@endsection('main')