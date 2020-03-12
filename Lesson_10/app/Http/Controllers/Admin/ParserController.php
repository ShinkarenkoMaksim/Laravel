<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    private function addCategory($category)
    {
        $newCat = new Category();
        $newCat->title = $category;
        $newCat->url = \Str::slug($category);
        $newCat->save();
        return $newCat->id;
    }

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
        $category = Category::query()->where('title', '=', $data['title'])->get()->toArray();
        if (!empty($category))
            $categoryId = $category[0]['id'];
        else
            $categoryId = $this->addCategory($data['title']);

        foreach ($data['news'] as $item) {
            $news = new News();

            $news->fill([
                'title' => $item['title'],
                'category_id' => $categoryId,
                'text' => $item['description'],
                'img' => $img
            ]);

            $news->save();
        }

        return redirect()->route('admin.news.index')->with('success', 'Новости добавлены в БД успешно');

    }
}
