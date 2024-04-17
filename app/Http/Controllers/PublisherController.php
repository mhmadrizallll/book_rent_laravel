<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();

        if ($request->keyword_category || $request->keyword_title) {
            $book = Book::where('title', 'LIKE', '%' . $request->keyword_title . '%')
                ->orWhereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->keyword_category);
                })->get();
        } else {
            $book = Book::all();
        }

        return view('book-list', ['book' => $book, 'category' => $category]);
    }
}
