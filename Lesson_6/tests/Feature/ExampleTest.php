<?php

namespace Tests\Feature;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddNews()
    {

        $response = $this->json('POST','/admin/addNews', [
                "category" => 2,
                "title" => "НовтостьТест",
                "text" => "lorem ipsum"
        ]);

        $response->assertRedirect('/admin/addNews');
        Storage::disk('local')->assertExists('news.txt');
    }
}
