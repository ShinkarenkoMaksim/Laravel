@extends('layouts.main')

@section('title')

    @parent Новости

@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2 class="m-3 modal-header">Новости</h2>
    <div class="row row-cols-3">
        @forelse($news as $item)

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">{{ $item['title'] }}</h2>
                    @if(!$item['isPrivate'])
                        <a class="btn btn-primary" href="{{ route('news.one', $item['id']) }}">Подробнее...</a>
                    @endif
                </div>
            </div>

        @empty
            <p>Нет новостей</p>

        @endforelse
    </div>
@endsection
