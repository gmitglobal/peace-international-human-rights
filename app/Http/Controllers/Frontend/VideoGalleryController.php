<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videogalleries = VideoGallery::where('status', '=', 1)->orderBy('id','desc')->paginate(8);
        return view('clients.video-gallery.video-gallery', compact('videogalleries'));
    }
}
