<x-app-layout>

    <div class="px-4 py-12 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">タグ一覧</h1>
                <p class="mt-2 text-sm text-gray-700">タグを新規に登録する場合は 「新規登録」 ボタンから登録してください。</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a
                   href="{{ route('tags.create') }}"
                   class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    新規登録
                </a>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                                @foreach ($tags as $tag)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $tag->id }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <a
                                           class="underline text-indigo-600 hover:text-indigo-900"
                                           href="{{ route('tags.show', $tag) }}"> {{ $tag->title }}</a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a
                                           href="{{ route('tags.edit', $tag) }}"
                                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        &nbsp;&nbsp;/&nbsp;&nbsp;
                                        <form action="{{ route('tags.destroy', $tag) }}" method="post" class="inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
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
    </div> --}}

</x-app-layout>