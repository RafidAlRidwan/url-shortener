<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
  public function shorten(Request $request)
  {
    $request->validate([
      'original_url' => 'required|url',
    ]);

    $shortUrl = Str::random(6);

    Url::create([
      'original_url' => $request->input('original_url'),
      'short_url' => $shortUrl,
      'user_id' => auth()->id(),
    ]);
    $shortUrl = url('form/' . $shortUrl);
    $url = 'Short URL generated: <a class="text-white" href="' . $shortUrl . '">' . $shortUrl . '</a>';
    return redirect()->back()->with('success', $url);
  }

  public function redirect($shortUrl)
  {
    $url = Url::where('short_url', $shortUrl)->firstOrFail();
    $url->increment('click_count');
    return redirect($url->original_url);
  }
}
