<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ブックマーク登録') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl py-12 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">ブックマークの登録</h3>
                    <p class="mt-1 text-sm text-gray-600">各フォームに必要事項を記入し「登録する」ボタンをクリックしてください。</p>
                </div>
            </div>
            @include('components.alert')
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="{{ route('bookmarks.store') }}">
                    @csrf

                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                           for="title"
                                           class="block text-sm font-medium text-gray-700">タイトル</label>
                                    <input
                                           type="text"
                                           name="title"
                                           id="title"
                                           autocomplete="bookmark title ..."
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                           value="{{ old('title', $bookmark->title ?? '') }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                           for="url"
                                           class="block text-sm font-medium text-gray-700">URL</label>
                                    <input
                                           type="text"
                                           name="url"
                                           id="url"
                                           autocomplete="bookmark url ..."
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                           value="{{ old('url', $bookmark->url ?? '') }}">
                                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                           for="description"
                                           class="block text-sm font-medium text-gray-700">内容の説明</label>
                                    <input
                                           type="text"
                                           name="description"
                                           id="description"
                                           autocomplete="bookmark description ..."
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                           value="{{ old('description', $bookmark->description ?? '') }}">
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>


                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                           for="tag"
                                           class="block text-sm font-medium text-gray-700">タグ</label>
                                    @foreach ($tags as $key => $tag)
                                    <input
                                           type="checkbox"
                                           name="tags[]"
                                           value="{{ $key }}"
                                           id="tag{{ $key }}"
                                           @checked (isset($bookmark->tags) && $bookmark->tags->contains($key))
                                    >
                                    <label
                                           class="mr-2"
                                           for="tag{{ $key }}">{{ $tag }}</label>
                                    @endforeach
                                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">登録する</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>