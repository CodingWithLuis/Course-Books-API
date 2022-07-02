<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(3)->create();

        Book::factory(3)->create();

        $books = Book::all();

        Author::all()->each(function ($author) use ($books) {
            $author->books()->attach(
                $books->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
