<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(News $news)
    {
        return view('news.all', ['news' => $news->getNews()]);
    }



    public function category(News $news)
    {
        return view('news.category', ['categories' => $news->getCategories()]);
    }


    public function newsOne($id, News $news)
    {
        if (array_key_exists($id, $news->getNews()))
        return view('news.one', ['news' => $news->getNews()[$id]]);
    else
        return redirect(route('news.all'));

    }

    public function categoryId($id, News $newsCl)
    {
        $news = [];
        foreach ($newsCl->getCategories() as $item) {
            if ($item['url'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, $newsCl->getCategories())) {
            $name = $newsCl->getCategories()[$id]['name'];
            foreach ($newsCl->getNews() as $item) {
                if ($item['category'] == $id)
                    $news[] = $item;
            }
            return view('news.oneCategory', ['news' => $news, 'category' => $name]);
        } else {
            return redirect(route('news.categories'));
        }
    }
}


