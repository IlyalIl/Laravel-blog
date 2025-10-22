<?php

namespace App\Service;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data, StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $tagIds = $data['tag_ids'] ?? [];
            unset($data['tag_ids']);

            if ($request->hasFile('preview_image')) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if ($request->hasFile('main_image')) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $request, $post)
    {
        try {
            DB::beginTransaction();
            $tagIds = $data['tag_ids'] ?? [];
            unset($data['tag_ids']);

            if ($request->hasFile('preview_image')) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if ($request->hasFile('main_image')) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post = Post::firstOrCreate($data);
            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
