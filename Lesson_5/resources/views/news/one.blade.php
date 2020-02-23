@extends('layouts.app')

@section('title', 'Одна новость')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    @if(!$news['isPrivate'])
        <h2>{{ $news['title'] }}</h2>
        <p>{{ $news['text'] }}</p>

    @else
        <br>Нет прав
    @endif
@endsection
