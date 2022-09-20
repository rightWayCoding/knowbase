@extends('layouts.base')

@section('title', 'Правка заметки :: Моя база знаний')

@section('main')
<form action="{{ route('note.update', ['note'=>$note->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="txtTitle">Заметка</label>
        <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror"  value="{{ old('title', $note->title) }}">
        @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtContent">Описание</label>
        <textArea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror" row="3">{{ old('content', $note->content) }}</textArea>        
        @error('content')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Сохранить">
</form>
@endsection