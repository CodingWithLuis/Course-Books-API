<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @group Book management
 *
 * APIs for managing books
 */
class BookController extends Controller
{
    /**
     * GET books
     *
     * List all books.
     */
    public function index()
    {
        return Cache::remember('books', 60 * 60 * 24, function () {
            return BookResource::collection(Book::with(['authors', 'chapters'])->get());
        });
    }

    /**
     * POST books
     *
     * Create new book.
     *
     * @bodyParam name string required The name of the book. Example: Libro 1
     * @bodyParam price int required The price of the book. Example: 50
     * @bodyParam published_date string required The published date of the book. Example: 2022-06-07
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * GET book
     *
     * Display info of the book.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * PUT book
     *
     * Update info of the book.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * DELETE book
     *
     * Delete an existing book.
     */
    public function destroy(Book $book)
    {
        //
    }
}
