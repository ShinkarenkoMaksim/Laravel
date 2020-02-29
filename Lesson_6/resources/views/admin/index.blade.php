@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Добро пожаловать Admin!</h1>
            </div>
        </div>
    </div>

    <div class="row row-cols-3">
        @forelse($news as $item)

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">{{ $item->title }}</h2>
                    <a class="btn btn-primary" href="{{ route('news.one', $item) }}">Подробнее...</a>
                    <a class="btn btn-secondary" href="{{ route('admin.updateNews', $item) }}">Edit</a>
                    <a class="btn btn-secondary" href="{{ route('admin.deleteNews', $item) }}">Delete</a>
                    {{--<form action="{{ route('admin.destroy', $item->id) }}" method="POST">
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>--}}
                </div>
            </div>

        @empty
            <p>Нет новостей</p>

        @endforelse
        {{ $news->links() }}
    </div>

@endsection
