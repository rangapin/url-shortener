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

        // Generate a unique shortened ID
        $shortenedId = $this->generateUniqueShortenedId();

        // Create a new URL record in the database
        $urlModel = Url::create([
            'url' => $url,
            'shortened_url' => $shortenedId,
        ]);

        // Return the shortened URL to the view
        return view('shortened', ['shortenedUrl' => $urlModel->shortened_url]);
    }

    private function generateUniqueShortenedId()
    {
        do {
            // Generate a random string or use any method to create a unique identifier
            $shortenedId = Str::random(6);
        } while (Url::where('shortened_url', $shortenedId)->exists());

        return $shortenedId;
    }


    public function redirectToUrl($shortenedUrl)
    {
        \Illuminate\Support\Facades\Log::info('Received shortened URL: ' . $shortenedUrl);

        // Find the corresponding record in the 'urls' table based on the shortened URL
        $url = Url::where('shortened_url', $shortenedUrl)->first();

        \Illuminate\Support\Facades\Log::info('Retrieved URL from database: ' . ($url ? $url->url : 'Not found'));

        // If the record is found, redirect to the original URL
        if ($url) {
            return redirect($url->url);
        }

        // If no record is found, return a 404 Not Found response
        abort(404);
    }


}

