<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Url;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
  public function index()
  {
    try {
      $totalUrls = Url::count();
      $totalUsers = User::count();
      $totalClickCountToday = Url::whereDate('created_at', Carbon::today())
        ->sum('click_count');
      return view('index', compact('totalUrls', 'totalUsers', 'totalClickCountToday'));
    } catch (\Throwable $th) {
      return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
    }
  }

  public function dashboard()
  {
    try {
      $urls = Url::where('user_id', Auth::user()->id)->get();
      return view('dashboard', compact('urls'));
    } catch (\Throwable $th) {
      return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
    }
  }
}
