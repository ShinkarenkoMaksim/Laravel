@extends('layouts.main')

@section('title')

    @parent Новости

@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2>Новости</h2>
    @forelse($news as $item)

        <div>
            <h2>{{ $item['title'] }}</h2>
            @if(!$item['isPrivate'])
                <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a>
            @endif
        </div>

    @empty
        <p>Нет новостей</p>

    @endforelse
@endsection
