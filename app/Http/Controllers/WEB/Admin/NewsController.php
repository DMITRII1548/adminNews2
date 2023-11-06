<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use App\Models\Tag;
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
        $tags = Tag::get();

        return view('admin.news.create', compact('tags'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tags = [];

        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $news = News::create($data);
        $news->tags()->attach($tags);

        return redirect()->route('admin.news.show', $news->id);
    }

    public function show(News $news): View
    {
        $tags = $news->tags;

        return view('admin.news.show', compact('news', 'tags'));
    }

    public function edit(News $news): View
    {
        $tags = Tag::get();

        $selectedTags = $news->tags;

        $selectedTagsIds = [];

        foreach ($selectedTags as $tag) {
            array_push($selectedTagsIds, $tag->id);
        }

        return view('admin.news.edit', compact( 'tags', 'news', 'selectedTagsIds'));
    }

    public function update(UpdateRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            Storage::disk('public')->delete($news->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        if (isset($data['tags'])) {
            $news->tags()->sync($data['tags']);

            unset($data['tags']);
        }

        $news->update($data);

        return redirect()->route('admin.news.show', $news->id);
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->tags()->detach();
        
        Storage::disk('public')->delete($news->preview_image);

        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
