@extends('layouts.main')

@section('title')
    @parent Категорий
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2>Категории</h2>
    @forelse($categories as $item)

        <div>
            <h2><a href="{{ route('news.categoryId',  $item['url']) }}">{{ $item['name'] }}</a></h2>
        </div>

    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection
