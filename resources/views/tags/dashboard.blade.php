<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タグ一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.alert')
                <div class="p-6 text-gray-900">
                    <p><a href="{{ route('tags.create') }}">新規登録</a></p>
                    @foreach ($tags as $tag)
                    <p>{{ $tag->id }}</p>
                    <p><a href="{{ route('tags.show', $tag) }}">{{ $tag->title }}</a></p>
                    <p><a href="{{ route('tags.edit', $tag) }}">編集</a></p>
                    <p>
                    <form action="{{ route('tags.destroy', $tag) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">削除</a>
                    </form>
                    </p>
                    @endforeach
                </div>
                {{ $tags->links() }}
            </div>
        </div>
    </div>
</x-app-layout>