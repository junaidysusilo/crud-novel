<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index(Request $request, $novel)
    {
        Ulasan::create([
            "rate" => $request->status,
            "user_id" => auth()->user() ? auth()->user()->id : 1,
            "novel_id" => $novel,
            "ulasan" => "null"
        ]);
        return redirect()->back();
    }
}
