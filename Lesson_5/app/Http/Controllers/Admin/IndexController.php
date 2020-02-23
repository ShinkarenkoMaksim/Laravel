<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index () {

        return view('admin.index');
    }

    public function addNews(Request $request, News $newsCl)
    {
        if ($request->isMethod('POST')) {
            $request->flash();
            $news = $newsCl->getNews();
            $newsOne = $request->except("_token");
            if (array_key_exists('id', end($news)))
                $newsOne['id'] = end($news)['id'] + 1;
            else
                $newsOne['id'] = 1;
            if (!array_key_exists( 'isPrivate', $newsOne))
                $newsOne['isPrivate'] = false;
            $news[] = $newsOne;
            Storage::put('news.txt', json_encode($news, JSON_UNESCAPED_UNICODE));
            return redirect()->route('admin.addNews');
        }
        return view('admin.addNews', ['categories' => $newsCl->getCategories()]);
    }

    public function test1 () {
        $content = view('admin.test1')->render();
        return response($content)
            ->header('Content-type', 'application/txt')
            ->header('Content-Length', mb_strlen($content))
            ->header('Content-Disposition', 'attachment; filename = "dl.txt"');
    }

    public function test2 (News $news) {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
