<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photogalleries = PhotoGallery::where('status', '=', 1)->orderBy('id','desc')->paginate(8);
        return view('clients.photo-gallery.photo-gallery', compact('photogalleries'));
    }
}
