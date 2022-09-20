@extends('layouts.base')

@section('title', 'Главная')

@section('main')
@if (count($notes) > 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>Заметка</th>
            <th>Содержание</th>
            <th>Владелец</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notes as $note)
        <tr>
            <td><h3>{{ $note->title }}</h3></td>
            <td>{{ $note->content }}</td>
            <td>{{ $note->user->name }}</td>
            <td>
                <a href="{{ route('detail', ['note'=> $note->id]) }}">Подробнее...</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection('main')


