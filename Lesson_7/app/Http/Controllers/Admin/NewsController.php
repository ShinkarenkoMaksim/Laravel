<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()->paginate(6);
        return view('admin.index', ['news' => $news]);
    }

    public function show (News $news) {
        return view('news.one', [
            'news' => $news
        ]);
    }

    public function edit (News $news) {
        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::query()->select('id', 'title')->get()
        ]);
    }

    private function saveImg(Request $request) {
        $path = $request->file('img')->store('public/img');
        return stristr($path, '/');
    }

    public function destroy(News $news)
    {
        $news->delete();
        if ($news) {
            return redirect()->route('admin.index')->with('success', 'Новость удалена');
        } else {
            return redirect()->route('admin.index')->with('error', 'Ошибка удаления');
        }

    }

    public function store(Request $request, News $news) {
        if ($request->isMethod('post')) {
            $this->validate($request, News::rules(), [], News::attributeNames());
            $news->fill($request->all());
            if ($request->file('img')) {
                $news->img = $this->saveImg($request);
            }
            $result = $news->save();

            if ($result) {
                return redirect()->route('admin.index')->with('success', 'Новость добавлена');
            } else {
                $request->flash();
                return redirect()->route('admin.create')->with('error', 'Ошибка добавления новости!');
            }
        }
    }

    public function update(Request $request, News $news) {
        if ($request->isMethod('PUT')) {
            $this->validate($request, News::rules(), [], News::attributeNames());
            $news->fill($request->all());
            if ($request->file('img')) {
                $news->img = $this->saveImg($request);
            }
            $result = $news->save();

            if ($result) {
                return redirect()->route('admin.index')->with('success', 'Новость исправлена');
            } else {
                $request->flash();
                return redirect()->route('admin.create')->with('error', 'Ошибка изменения новости!');
            }
        }
    }

    public function create()
    {
        $news = new News();
        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::query()->select('id', 'title')->get()
        ]);
    }
}
