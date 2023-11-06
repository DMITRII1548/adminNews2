<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(StoreRequest $request): Response
    {
        $data = $request->validated();

        $path = Storage::disk('public')->put('/images', $data['image']);

        return response([
            'path' => $path,
            'url' => url('/storage/'. $path)
        ]);
    }
}
