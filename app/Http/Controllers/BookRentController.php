<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $book = Book::all();
        return view('book-rent', ['user' => $user, 'book' => $book]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        // dd($request->all());

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'buku sedang dipinjam');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/book-rent');
        } else {
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', 'akun sudah mencapai limit pinjaman');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    // process insert rent logs
                    RentLog::create($request->all());
                    // update book status
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'buku berhasil dipinjam');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('/book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }

        }

    }
}
