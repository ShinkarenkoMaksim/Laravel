<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public static $categories = [
        '1' => ['id' => 1, 'name' => 'Экономика', 'url' => 'economika'],
        '2' => ['id' => 2, 'name' => 'Политика', 'url' => 'politika'],
        '3' => ['id' => 3, 'name' => 'Спорт', 'url' => 'sport'],
        '4' => ['id' => 4, 'name' => 'Наука', 'url' => 'nauka'],
    ];

    public static $news = [
        '1' => [
            'id' => 1,
            'category' => 1,
            'title' => 'ЦБ снизил ключевую ставку до 0',
            'text' => 'А у нас новость 1 и она очень хорошая! Бесплатные кредиты!',
            'isPrivate' => false,
        ],
        '2' => [
            'id' => 2,
            'category' => 1,
            'title' => 'Налог НДС установлен на 80%',
            'text' => 'А тут плохие новости((( Денег у людей не осталось совсем',
            'isPrivate' => false,
        ],
        '3' => [
            'id' => 3,
            'category' => 1,
            'title' => 'Капитал Газпрома вырос на 10000%',
            'text' => 'Возрадуемся! Топ-менеджмент Газпрома получит хорошую зарплату!',
            'isPrivate' => false,
        ],
        '4' => [
            'id' => 4,
            'category' => 2,
            'title' => 'Путин В.В.',
            'text' => 'Путин В.В. попросил изменить Конституцию и увековечить себя в президентах!',
            'isPrivate' => false,
        ],
        '5' => [
            'id' => 5,
            'category' => 2,
            'title' => 'Госдума распустилась',
            'text' => 'Отныне всю власть страны представляет Президент РФ',
            'isPrivate' => false,
        ],
        '6' => [
            'id' => 6,
            'category' => 3,
            'title' => 'Нокаут',
            'text' => 'Емельяненко нокаутировал целый наряд ДПС одним взглядом',
            'isPrivate' => false,
        ],
        '7' => [
            'id' => 7,
            'category' => 3,
            'title' => 'Футбол',
            'text' => 'Наша сборная неплохо выступила на ЧМ, проиграв не всухую',
            'isPrivate' => false,
        ],
        '8' => [
            'id' => 8,
            'category' => 3,
            'title' => 'Хоккей',
            'text' => 'Разгромили всех! Невероятные голы были забиты всем соперникам! Правда, предстоит сдать анализы на допинг...',
            'isPrivate' => false,
        ],
        '9' => [
            'id' => 9,
            'category' => 4,
            'title' => 'Увеличение дотаций',
            'text' => 'Министерство науки увеличило зарплаты научным сотрудникам вдвое! Это почти перекроет рост инфляции',
            'isPrivate' => false,
        ],
        '10' => [
            'id' => 10,
            'category' => 4,
            'title' => 'Переплюнуть Маска!',
            'text' => 'Ученые РФ создали ракету будущего! Теперь она работает только на аккумуляторах!',
            'isPrivate' => false,
        ],
        '11' => [
            'id' => 11,
            'category' => 4,
            'title' => 'Новые технологии',
            'text' => 'Ученые приблизились к созданию вечного двигателя',
            'isPrivate' => false,
        ],
        '12' => [
            'id' => 12,
            'category' => 4,
            'title' => 'Учимся кодить ИИ',
            'text' => 'С помощью созданного ИИ на уроках Гикбрейнс теперь возможно выполнять вычисления любого уровня сложности',
            'isPrivate' => false,
        ],
        '13' => [
            'id' => 13,
            'category' => 1,
            'title' => 'Рост ВВП',
            'text' => 'ВВП страны вырос на 12523325%, вплотную приблизившись к показателям инфлации',
            'isPrivate' => true,
        ],
        '14' => [
            'id' => 14,
            'category' => 3,
            'title' => 'На велосипеде',
            'text' => 'Прошли соревнования в кроссовом заезде на трехколесных велосипедах "Гном-4"',
            'isPrivate' => true,
        ],
        '15' => [
            'id' => 15,
            'category' => 2,
            'title' => 'Встреча на высшем уровне',
            'text' => 'Главы первых стран мира (ЦАР и Эфиопии) обсудили проблемы в недоразвитой Америке и загнивающем Западе',
            'isPrivate' => true,
        ],
    ];
}