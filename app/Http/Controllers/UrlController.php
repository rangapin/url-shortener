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

        // Generate the complete URL using the url() helper function
        $completeUrl = url($shortenedUrl);

        Url::create([
            'url' => $url,
            'shortened_url' => $completeUrl,
        ]);

        return view('shortened', ['shortenedUrl' => $completeUrl]);
    }


    public function redirectToUrl($shortenedUrl)
    {
        $url = Url::where('shortened_url', url($shortenedUrl))->first();

        if ($url) {
            return redirect($url->url);
        }

        abort(404);
    }
}

