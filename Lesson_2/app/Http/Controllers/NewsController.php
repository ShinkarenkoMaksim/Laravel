<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $categories = [
        ['id' => 1, 'name' => 'Экономика', 'url' => 'economika'],
        ['id' => 2, 'name' => 'Политика', 'url' => 'politika'],
        ['id' => 3, 'name' => 'Спорт', 'url' => 'sport'],
        ['id' => 4, 'name' => 'Наука', 'url' => 'nauka'],
    ];

    private $news = [
        [
            'id' => 1,
            'category' => 1,
            'title' => 'ЦБ снизил ключевую ставку до 0',
            'text' => 'А у нас новость 1 и она очень хорошая! Бесплатные кредиты!'
        ],
        [
            'id' => 2,
            'category' => 1,
            'title' => 'Налог НДС установлен на 80%',
            'text' => 'А тут плохие новости((( Денег у людей не осталось совсем'
        ],
        [
            'id' => 3,
            'category' => 1,
            'title' => 'Капитал Газпрома вырос на 10000%',
            'text' => 'Возрадуемся! Топ-менеджмент Газпрома получит хорошую зарплату!'
        ],
        [
            'id' => 4,
            'category' => 2,
            'title' => 'Путин В.В.',
            'text' => 'Путин В.В. попросил изменить Конституцию и увековечить себя в президентах!'
        ],
        [
            'id' => 5,
            'category' => 2,
            'title' => 'Госдума распустилась',
            'text' => 'Отныне всю власть страны представляет Президент РФ'
        ],
        [
            'id' => 6,
            'category' => 3,
            'title' => 'Нокаут',
            'text' => 'Емельяненко нокаутировал целый наряд ДПС одним взглядом'
        ],
        [
            'id' => 7,
            'category' => 3,
            'title' => 'Футбол',
            'text' => 'Наша сборная неплохо выступила на ЧМ, проиграв не всухую'
        ],
        [
            'id' => 8,
            'category' => 3,
            'title' => 'Хоккей',
            'text' => 'Разгромили всех! Невероятные голы были забиты всем соперникам! Правда, предстоит сдать анализы на допинг...'
        ],
        [
            'id' => 9,
            'category' => 4,
            'title' => 'Увеличение дотаций',
            'text' => 'Министерство науки увеличило зарплаты научным сотрудникам вдвое! Это почти перекроет рост инфляции'
        ],
        [
            'id' => 10,
            'category' => 4,
            'title' => 'Переплюнуть Маска!',
            'text' => 'Ученые РФ создали ракету будущего! Теперь она работает только на аккумуляторах!'
        ],
        [
            'id' => 11,
            'category' => 4,
            'title' => 'Новые технологии',
            'text' => 'Ученые приблизились к созданию вечного двигателя'
        ],
        [
            'id' => 12,
            'category' => 4,
            'title' => 'Учимся кодить ИИ',
            'text' => 'С помощью созданного ИИ на уроках Гикбрейнс теперь возможно выполнять вычисления любого уровня сложности'
        ],
        [
            'id' => 13,
            'category' => 1,
            'title' => 'Рост ВВП',
            'text' => 'ВВП страны вырос на 12523325%, вплотную приблизившись к показателям инфлации'
        ],
        [
            'id' => 14,
            'category' => 3,
            'title' => 'На велосипеде',
            'text' => 'Прошли соревнования в кроссовом заезде на трехколесных велосипедах "Гном-4"'
        ],
        [
            'id' => 15,
            'category' => 2,
            'title' => 'Встреча на высшем уровне',
            'text' => 'Главы первых стран мира (ЦАР и Эфиопии) обсудили проблемы в недоразвитой Америке и загнивающем Западе'
        ],
    ];

    public function categories () {
        $homeRote = route('home');
        $newsRote = route('news');
        $adminRote = route('admin.admin');
        $html = /** @lang HTML */ <<<php
<a href="{$homeRote}">Главная</a>
<a href="{$newsRote}">Новости</a>
<a href="{$adminRote}">Админка</a>
<h2>Категории</h2>
php;
        foreach ($this->categories as $category) {
            $html .= /** @lang HTML */ <<<php
<a href="/{$category['url']}">{$category['name']}</a><br>
php;
        }
        return $html;

    }

    public function category ($url) {
        $homeRote = route('home');
        $newsRote = route('news');
        $adminRote = route('admin.admin');
        $html = /** @lang HTML */ <<<php
<a href="{$homeRote}">Главная</a>
<a href="{$newsRote}">Новости</a>
<a href="{$adminRote}">Админка</a>
<h2>Категории</h2>
php;
        $idCategory = $this->categories[array_search($url, array_column($this->categories, 'url'))]['id'];
        foreach ($this->news as $news) {
            if ($news['category'] == $idCategory) {
                $html .= /** @lang HTML */
                    <<<php
<a href="/news/{$news['id']}">{$news['title']}</a><br>
php;
            }
        }
        return $html;
    }


    public function newsOne ($id) {
        $homeRote = route('home');
        $newsRote = route('news');
        $adminRote = route('admin.admin');
        $html = /** @lang HTML */ <<<php
<a href="{$homeRote}">Главная</a>
<a href="{$newsRote}">Новости</a>
<a href="{$adminRote}">Админка</a>

php;
        $news = $this->getNewsId($id);

        if (!empty($news)) {
            $html .= /** @lang HTML */ <<<php
<h2>{$news['title']}</h2>
<p>{$news['text']}</p>
php;

            return $html;
        }

        return redirect(route('news'));

    }

    private function getNewsId($id) {
        foreach ($this->news as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
    }
}
