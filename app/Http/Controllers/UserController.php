<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rent_log = RentLog::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rentLog' => $rent_log]);
    }

    public function index()
    {
        $user = User::where('role_id', 2)->where('status', 'active')->get();
        return view('users', ['user' => $user]);
    }

    public function registered()
    {
        $user = User::where('role_id', 2)->where('status', 'inactive')->get();
        return view('user-registered', ['user' => $user]);
    }

    public function register($slug)
    {
        $user = User::where('slug', $slug)->first();
        $rent_log = RentLog::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('user-register', ['user' => $user, 'rentLog' => $rent_log]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-register/' . $slug)->with('status', 'user approve success');
    }

    public function ban($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-ban', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('/users')->with('status', 'user delete success');
    }

    public function banned()
    {
        $user = User::onlyTrashed()->get();
        return view('user-banned', ['user' => $user]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        return redirect('/users')->with('status', 'user restore success');
    }
}
