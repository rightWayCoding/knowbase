@extends('layouts.base')

@section('title', 'Добавление заметки :: Моя база знаний')

@section('main')
<form action="{{ route('note.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="txtTitle">Заметка</label>
        <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror" value={{ old('title')}}>
        @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtContent">Описание</label>
        <textArea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror" row="3">{{ old('content') }}</textArea>
        @error('content')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>
@endsection