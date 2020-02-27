<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function all() {
        $news = News::query()->paginate(6);
        return view('admin.index', ['news' => $news]);
    }

    public function update (Request $request, News $news) {
        return view('admin.addNews', [
            'news' => $news,
            'categories' => DB::table('categories')->get()
        ]);
    }

    private function saveImg(Request $request) {
        $path = $request->file('img')->store('public/img');
        return stristr($path, '/');
    }

    public function delete(Request $request, News $news)
    {
        $news->delete();
        return redirect()->route('admin.News')->with('success', 'Новость удалена');
    }

    public function save(Request $request, News $news) {
        if ($request->isMethod('post')) {
            $news->fill($request->all());
            if ($request->file('img')) {
                $news->img = $this->saveImg($request);
            }
            $news->save();
            return redirect()->route('admin.News')->with('success', 'Новость исправлена');
        }
    }

    public function add(Request $request, News $news)
    {
        if ($request->isMethod('POST')) {
            $request->flash();

            $news = new News();
            $news-> fill($request->all());
            if ($request->file('img'))
                $news->img = $this->saveImg($request);
            $news->save();

            return redirect()->route('admin.News')->with('success', 'Новость добавлена');
        }
        return view('admin.addNews', [
            'news' => $news,
            'categories' => DB::table('categories')->get()
        ]);
    }
}
