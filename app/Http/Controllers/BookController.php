<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all();
        return view('books', ['book' => $book]);
    }

    public function add()
    {
        $category = Category::all();
        return view('book-add', ['category' => $category]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // return $request->file('image')->store('cover');
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        // $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('cover', $newName);
        }

        $request['image'] = $newName;
        // dd($request->image);

        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book added Successfully');
    }

    public function edit($slug)
    {
        $category = Category::all();
        $book = Book::where('slug', $slug)->first();
        return view('book-edit', ['category' => $category, 'book' => $book]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('cover', $newName);
            $request['image'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }
        $book->slug = null;
        $book->update($request->all());
        return redirect('books')->with('status', 'Book edit Successfully');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('book-delete', ['book' => $book]);
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book deletee Successfully');
    }

    public function deleted()
    {
        $book = Book::onlyTrashed()->get();
        return view('book-deleted', ['book' => $book]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restore Successfully');
    }
}
