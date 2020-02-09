<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $homeRote = route('home');
        $newsRote = route('news');
        $adminRote = route('admin.admin');

        return  /** @lang HTML */ <<<php
<a href="{$homeRote}">Главная</a>
<a href="{$newsRote}">Новости</a>
<a href="{$adminRote}">Админка</a>
<h1>Рады Вас видеть на нашем лучшем сайте новостей!</h1>
php;

    }
}
