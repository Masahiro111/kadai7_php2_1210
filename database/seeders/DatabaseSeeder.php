<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bookmark;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Bookmark::query()->create([
            'title' => 'sample',
            'url' => 'https://example.com/',
            'description' => 'ブックマークの説明',
        ]);

        Tag::query()->create([
            'title' => '文芸',
        ]);

        Tag::query()->create([
            'title' => '新書',
        ]);

        Tag::query()->create([
            'title' => '実用書',
        ]);
    }
}
