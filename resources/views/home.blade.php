@extends('layouts.base')

@section('title', 'Мои база знаний')

@section('main')
<h3 class="text-center">Добро пожаловать, {{ Auth::user()->name }}</h3>
<p class="text-right"><a href="{{ route('note.add') }}">Добавить заметку</a></p>
@if (count($notes) > 0)
<table class="">
    <thead>
        <tr>
            <th>Заметка</th>
            <th>Содержание</th>
            <th colspan="3">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notes as $note)
            <tr>
                <td>
                    <h3>{{ $note->title }}</h3>
                </td>
                <td>
                    {{ $note->content }}
                </td>
                <td>
                    <a href="{{ route('note.edit', ['note' => $note->id]) }}">Изменить</a>
                </td>
                <td>
                    <a href="{{ route('note.delete', ['note' => $note->id]) }}">Удалить</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection