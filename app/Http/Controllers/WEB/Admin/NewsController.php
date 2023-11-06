<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::get();

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $news = News::create($data);

        return redirect()->route('admin.news.show', $news->id);
    }

    public function show(News $news): View
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact( 'news'));
    }

    public function update(UpdateRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            Storage::disk('public')->delete($news->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $news->update($data);

        return redirect()->route('admin.news.show', $news->id);
    }

    public function destroy(News $news): RedirectResponse
    {
        Storage::disk('public')->delete($news->preview_image);

        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
