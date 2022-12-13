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
                    タイトル：{{ $bookmark->title }}<br>
                    URL： <a href="{{ $bookmark->url }}">{{ $bookmark->url }}</a><br>
                    概要：{{ $bookmark->description }}<br>
                    作成日：{{ $bookmark->created_at->format('Y年m月d日') }}<br>


                </div>
            </div>
        </div>
</x-app-layout>