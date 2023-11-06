<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    public function addLike(News $news): Response
    {
        $news->likes = $news->likes + 1;
        $news->save();

        return response([
            'likes' => $news->likes
        ]);
    }

    public function removeLike(News $news): Response
    {
        $news->likes = $news->likes - 2;
        $news->save();

        return response([
            'likes' => $news->likes
        ]);
    }
}
