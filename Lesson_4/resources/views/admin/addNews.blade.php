@extends('layouts.app')

@section('title')
    @parent Добавление новости
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <form class="mt-4" action="{{ route('admin.addNews') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="newsTitle">Название новости</label>
            <input name="title" type="text" class="form-control" id="newsTitle" placeholder="Название новости" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="newsCategory">Категория новости</label>
            <select name="category" class="form-control" id="newsCategory">
                @forelse($categories as $item)
                    <option @if ($item['id'] == old('category')) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @empty
                    <h2>Нет категорий</h2>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="newsText">Текст новости</label>
            <textarea name="text" class="form-control" id="newsText" rows="15">{{ old('text') }}</textarea>
        </div>
        <div class="form-check">
            <input @if (old('isPrivate')) checked @endif name="isPrivate" class="form-check-input" type="checkbox" value="1" id="privateNews">
            <label class="form-check-label" for="privateNews">
                Приватная новость
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Отправить</button>
    </form>
@endsection
