<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\UpdateRequest;
use App\Models\PageColor;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function show()
    {
        $section = PageColor::first();

        return view('admin.section.show', compact('section'));
    }

    public function edit()
    {
        $section = PageColor::first();

        return view('admin.section.edit', compact('section'));
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();

        PageColor::first()->update($data);

        return redirect()->route('admin.section.show');
    }
}
