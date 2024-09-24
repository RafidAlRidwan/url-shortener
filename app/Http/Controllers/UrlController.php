<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
  public function shorten(Request $request)
  {
    try {
      $request->validate([
        'original_url' => 'required|url',
      ]);

      $shortUrl = Str::random(8);

      Url::create([
        'original_url' => $request->input('original_url'),
        'short_url' => $shortUrl,
        'user_id' => auth()->id(),
      ]);
      $shortUrl = url('form/' . $shortUrl);
      $originalUrl = 'Original URL: <a class="text-white" href="' . $request->input('original_url') . '">' . $request->input('original_url') . '</a>';
      $url = 'Short URL generated: <a class="text-white" href="' . $shortUrl . '">' . $shortUrl . '</a>';
      return redirect()
        ->back()
        ->with('success', $url)
        ->with('original_url', $originalUrl);
    } catch (\Throwable $th) {
      return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
    }
  }

  public function redirect($shortUrl)
  {
    try {
      $url = Url::where('short_url', $shortUrl)->firstOrFail();
      $url->increment('click_count');
      return redirect($url->original_url);
    } catch (\Throwable $th) {
      return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
    }
  }
}
