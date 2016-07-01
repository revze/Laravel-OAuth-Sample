<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use MetzWeb\Instagram\Instagram;

class InstagramController extends Controller
{
    public function getToken()
    {
      $instagram = new Instagram([
        'apiKey'      => env('INSTAGRAM_CLIENT_ID'),
        'apiSecret'   => env('INSTAGRAM_CLIENT_SECRET'),
        'apiCallback' => env('INSTAGRAM_CALLBACK_URL')
      ]);

      return $instagram;
    }
}
