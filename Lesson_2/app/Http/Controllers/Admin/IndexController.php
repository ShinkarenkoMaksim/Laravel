<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index () {
        $homeRote = route('home');
        $newsRote = route('news');
        $adminRote = route('admin.admin');
        return /** @lang HTML */ <<<php
<a href="/">Главная</a>
<a href="/admin/test1">Тест1</a>
<a href="/admin/test2">Тест2</a>
<h1>Добро пожаловать Admin!</h1>
php;

    }

    public function test1 () {
        return /** @lang HTML */ <<<php
<a href="/">Главная</a>
<a href="/admin/admin">Админка</a>
<h2>test1</h2>
php;
    }

    public function test2 () {
        return /** @lang HTML */ <<<php
<a href="/">Главная</a>
<a href="/admin/admin">Админка</a>
<h2>test2</h2>
php;
    }
}
