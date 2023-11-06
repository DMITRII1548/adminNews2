<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->where('publish_date', '<=', Carbon::now())->get();

        $trend = News::orderBy('likes', 'desc')->first();

        $lastUpdated = News::orderBy('updated_at', 'desc')->limit(4)->get();

        return view('news.index', compact('news', 'trend', 'lastUpdated'));
    }

    public function show(News $news)
    {
        $news->views = $news->views + 1;
        $news->save();

        $recomendations = News::orderBy('likes', 'desc')->limit(2)->get();
        $topics = News::orderBy('likes', 'desc')->limit(6)->get();

        return view('news.show', compact('news', 'recomendations', 'topics'));
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string'
        ]);

        $news = News::where('title', 'like', '%' . $data['title'] . '%')->where('publish_date', '<=', Carbon::now())->get();


        $trend = News::orderBy('likes', 'desc')->first();

        $lastUpdated = News::orderBy('updated_at', 'desc')->limit(4)->get();

        return view('news.index', compact('news', 'trend', 'lastUpdated'));
    }
}
