<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UrlController extends Controller

{
    public function shortenUrl(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $url = $request->input('url');
        $shortenedUrl = Str::random(6); 

        Url::create([
            'url' => $url,
            'shortened_url' => $shortenedUrl,
        ]);

        return view('shortened', ['shortenedUrl' => $shortenedUrl]);
    }

    public function redirectToUrl($shortenedUrl)
    {
        $url = Url::where('shortened_url', $shortenedUrl)->first();

        if ($url) {
            return redirect($url->url);
        }

        abort(404);
    }}
