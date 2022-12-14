<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ブックマーク編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.alert')
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('bookmarks.update', $bookmark) }}">
                        @method('PUT')
                        @csrf

                        <p>title:</p>
                        <p><input type="text" name="title" value="{{ old('title', $bookmark->title ?? '') }}"></p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />

                        <p>url:</p>
                        <p><input type="text" name="url" value="{{  old('url', $bookmark->url ?? '') }} "></p>
                        <x-input-error :messages="$errors->get('url')" class="mt-2" />

                        <p>description:</p>
                        <p><input type="text" name="description" value="{{  old('description', $bookmark->description ?? '') }}"></p>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                        <p>tags:</p>
                        <div>
                            @foreach ($tags as $key => $tag)
                            <input
                                   type="checkbox"
                                   name="tags[]"
                                   value="{{ $key }}"
                                   id="tag{{ $key }}"
                                   @checked (isset($bookmark->tags) && $bookmark->tags->contains($key))
                            >
                            <label for="tag{{ $key }}">{{ $tag }}</label>
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('tags')" class="mt-2" />

                        <button type="submit">送信</button>
                        <a href="{{ route('dashboard') }}">もどる</a>
                    </form>

                    {{-- タイトル：{{ $bookmark->title }}<br>
                    URL： <a href="{{ $bookmark->url }}">{{ $bookmark->url }}</a><br>
                    概要：{{ $bookmark->description }}<br>
                    作成日：{{ $bookmark->created_at->format('Y年m月d日') }}<br> --}}


                </div>
            </div>
        </div>
</x-app-layout>