<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news () {

        return view('news.all', ['news' => News::$news]);

    }

    public function category () {
        return view('news.category', ['categories' => News::$categories]);
    }


    public function newsOne ($id) {
        if (array_key_exists($id, News::$news))
            return view('news.one', ['news' => News::$news[$id]]);
        else
            return redirect(route('news.all'));

    }

    public function categoryId ($id) {
        $news = [];

        foreach (News::$categories as $item) {
            if ($item['url'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, News::$categories)) {

            $name = News::$categories[$id]['name'];
            foreach (News::$news as $item) {
                if ($item['category'] == $id)
                    $news[] = $item;
            }
            return view('news.oneCategory', ['news' => $news, 'category' => $name]);
        } else {
            return redirect(route('news.categories'));
        }
    }

}


