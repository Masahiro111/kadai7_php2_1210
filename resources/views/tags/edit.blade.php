<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タグ編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.alert')
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('tags.update', $tag) }}">
                        @method('PUT')
                        @csrf
                        <p>title:</p>
                        <p><input type="text" name="title" value="{{ $tag->title ?? '' }}"></p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        <button type="submit">送信</button>
                        <a href="{{ route('tags.index') }}">もどる</a>
                    </form>

                    {{-- タイトル：{{ $tag->title }}<br>
                    URL： <a href="{{ $tag->url }}">{{ $tag->url }}</a><br>
                    概要：{{ $tag->description }}<br>
                    作成日：{{ $tag->created_at->format('Y年m月d日') }}<br> --}}


                </div>
            </div>
        </div>
</x-app-layout>