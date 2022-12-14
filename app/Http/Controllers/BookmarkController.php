<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Http\Requests\StoreBookmarkRequest;
use App\Http\Requests\UpdateBookmarkRequest;
use App\Models\Tag;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = Bookmark::query()
            ->latest()->paginate(20);

        return view('dashboard', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::query()->pluck('title', 'id')->toArray();

        return view('bookmarks.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookmarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookmarkRequest $request)
    {
        $bookmark = Bookmark::query()
            ->create($request->validated());

        $bookmark->tags()->sync($request->tags);

        return redirect()
            ->route('dashboard')
            ->with('status', 'ブックマークを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        $tags = Tag::query()->pluck('title', 'id')->toArray();

        return view('bookmarks.edit', compact('bookmark', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookmarkRequest  $request
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookmarkRequest $request, Bookmark $bookmark)
    {
        $bookmark::query()
            ->update($request->validated());

        $bookmark->tags()->sync($request->tags);



        return redirect()
            ->route('bookmarks.edit', $bookmark)
            ->with('status', 'ブックマークを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();

        $bookmark->tags()->detach();

        return redirect()
            ->route('dashboard')
            ->with('status', 'ブックマークを削除しました');
    }
}
