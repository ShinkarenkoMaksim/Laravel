@extends('layouts.main')

@section('title')
    @parent Добавление новости
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <form class="mt-4">
        <div class="form-group">
            <label for="newsTitle">Название новости</label>
            <input type="text" class="form-control" id="newsTitle" placeholder="Название новости">
        </div>
        <div class="form-group">
            <label for="newsCategory">Категория новости</label>
            <select class="form-control" id="newsCategory">
                <option>Экономика</option>
                <option>Политика</option>
                <option>Спорт</option>
                <option>Наука</option>
            </select>
        </div>
        <div class="form-group">
            <label for="newsText">Текст новости</label>
            <textarea class="form-control" id="newsText" rows="15"></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="privatNews">
            <label class="form-check-label" for="privatNews">
                Приватная новость
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Отправить</button>
    </form>
@endsection
