<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {

        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
        ]);

        $img = $data['image'];

        $category = Category::firstOrCreate(['title' => $data['title']],
            [
                'url' => \Str::slug($data['title']),
            ])->id;

        foreach ($data['news'] as $item) {
            $news = new News();

            $news->firstOrCreate(['title' => $item['title']],
                [
                    'category_id' => $category,
                    'text' => $item['description'],
                    'img' => $img
                ]);
            // Либо сохраняем циклом, но через Eloquent, либо вне цикла через DB:: и городим проверку сущестующей новости...
            // Остановлюсь пока на этом, скорость будем считать неважной в данном случае.
        }

        return redirect()->route('admin.news.index')->with('success', 'Новости добавлены в БД успешно');

    }
}
