<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    public $categories = [];

    public $news = [];

    public function getNews()
    {
        $this->news = json_decode(Storage::get('news.txt'), true);
        return $this->news;
    }

    public function getCategories(){

        $this->categories = json_decode(Storage::get('categories.txt'), true);
        return $this->categories;
    }
}
