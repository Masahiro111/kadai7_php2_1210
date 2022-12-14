<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ブックマーク一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.alert')
                <div class="p-6 text-gray-900">
                    <p><a href="{{ route('bookmarks.create') }}">新規登録</a></p>
                    @foreach ($bookmarks as $bookmark)
                    <p>{{ $bookmark->id }}</p>
                    <p><a href="{{ route('bookmarks.show', $bookmark) }}">{{ $bookmark->title }}</a></p>
                    <p>
                        @foreach ($bookmark->tags as $tag)
                        <a href="{{ route('tags.show', $tag) }}">{{ $tag->title }}</a>
                        @endforeach
                    </p>
                    <p><a href="{{ route('bookmarks.edit', $bookmark) }}">編集</a></p>
                    <p>
                    <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">削除</a>
                    </form>
                    </p>
                    @endforeach
                </div>
                {{ $bookmarks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>