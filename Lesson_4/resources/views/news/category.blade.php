@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2 class="m-3 modal-header">Категории</h2>
    <ul class="list-group">
    @forelse($categories as $item)

        <li class="list-group-item">
            <h2><a href="{{ route('news.categoryId',  $item['url']) }}">{{ $item['name'] }}</a></h2>
        </li>

    @empty
        <p>Нет новостей</p>
    @endforelse
    </ul>
@endsection
