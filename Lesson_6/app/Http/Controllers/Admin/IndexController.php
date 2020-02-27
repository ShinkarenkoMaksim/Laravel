<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\NewsController;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index () {

        return view('admin.index');
    }

    public function saveImg(Request $request) {
        $path = $request->file('img')->store('public/img');
        return stristr($path, '/');
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->flash();
            $newsOne = $request->except("_token");
            if (!array_key_exists( 'is_private', $newsOne))
                $newsOne['is_private'] = false;
            $newsOne['img'] = $this->saveImg($request);
            DB::table('news')->insert($newsOne);

            return redirect()->route('news.all')->with('success', 'Новость добавлена');
        }
        return view('admin.addNews', ['categories' => DB::table('categories')->get()]);
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
