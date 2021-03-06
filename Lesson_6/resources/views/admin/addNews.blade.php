@extends('layouts.app')

@section('title')
    @parent Добавление новости
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <form class="mt-4" action="@if(!$news->id){{ route('admin.addNews') }} @else {{ route('admin.saveNews', $news) }} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="newsTitle">Название новости</label>
            <input name="title" type="text" class="form-control" id="newsTitle" placeholder="Название новости" value="{{ $news->title ?? old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="newsCategory">Категория новости</label>
            <select name="category_id" class="form-control" id="newsCategory">
                @forelse($categories as $item)
                    <option @if ($item->id == old('category_id')) selected @endif value="{{ $item->id }}">{{ $item->title }}</option>
                @empty
                    <h2>Нет категорий</h2>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="newsText">Текст новости</label>
            <textarea name="text" class="form-control" id="newsText" rows="15" required>{{ $news->text ?? old('text') }}</textarea>
        </div>
        <div class="form-check">
            <input @if (old('is_private')) checked @endif name="is_private" class="form-check-input" type="checkbox" value="1" id="privateNews">
            <label class="form-check-label" for="privateNews">
                Приватная новость
            </label>
        </div>
        <div class="form-group mt-2">
            <label for="img">Загрузите изображение</label>
            <input name="img" type="file" class="form-control-file" id="img" accept="image/jpeg">
        </div>
        <button type="submit" class="btn btn-primary mt-3">
            @if($news->id) Изменить @else Добавить @endif
        </button>
    </form>
@endsection
