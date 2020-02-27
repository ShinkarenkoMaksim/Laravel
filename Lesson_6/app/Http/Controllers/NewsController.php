<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news()
    {
        $news = DB::table('news')->get();

        return view('news.all', ['news' => $news]);
    }


    public function categories()
    {
        $categories = DB::table('categories')->get();

        return view('news.category', ['categories' => $categories]);
    }


    public function newsOne($id)
    {
        $news = DB::table('news')->find($id);
        if (!empty($news))
            return view('news.one', ['news' => $news]);

        else
            return redirect(route('news.all'));

    }

    public function categoryId($url)
    {
        $categories = DB::table('categories')->where('url', '=', $url)->get();
        if (!empty($categories)) {
            $category = $categories[0]->title;
            $news = DB::table('news')->where('category_id', '=', $categories[0]->id)->get();
            return view('news.oneCategory', ['news' => $news, 'category' => $category]);
        } else
            return redirect(route('news.categories'));


    }
}


