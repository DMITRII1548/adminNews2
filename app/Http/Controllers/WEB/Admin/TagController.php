<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::get();
        return view('admin.tag.index', compact('tags'));
    }

    public function show(Tag $tag): View
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag): RedirectResponse
    {
        $data = $request->validated();

        $tag->update($data);

        return redirect()->route('admin.tag.show', $tag->id);
    }

    public function create(): View
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $tag = Tag::create($data);

        return redirect()->route('admin.tag.show', $tag->id);
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->news()->detach();

        $tag->delete();

        return redirect()->route('admin.tag.index');
    }
}
