<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    </head>

    <body class="antialiased">

        <header class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-wrap p-5 md:px-8 flex-col md:flex-row justify-between">
                <a
                   href="{{ route('top') }}"
                   class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <span class="text-lg font-bold tracking-wide">ScraBook.</span>
                </a>
                @if (Route::has('login'))
                <div>
                    @auth
                    <a
                       href="{{ route('dashboard')}}"
                       class="mr-5 hover:text-gray-900 underline">My page</a>
                    @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-slate-100 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-2 border-1 border-gray-500">Sign In</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Sign Up</a>
                    @endif
                    @endauth
                </div>
                @endif

            </div>
        </header>


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-16">
            <section class="text-gray-600 body-font overflow-hidden">
                <div class="container px-5 pt-12 pb-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">New ScraBook !</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">ScraBook. は、手軽にブックマークをシェアするアプリです 📗</p>
                    </div>
                    <div class="-my-8 divide-y-2 divide-gray-100">

                        @foreach ($bookmarks as $bookmark)
                        <div class="py-8 flex flex-wrap md:flex-nowrap hover:bg-blue-50">
                            <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                {{-- <span class="font-semibold title-font text-gray-700">CATEGORY</span> --}}
                                <span class="ml-8 mt-2 text-gray-500 text-sm">{{ $bookmark->created_at }}</span>
                            </div>
                            <a
                               href="{{ $bookmark->url }}"
                               class="md:flex-grow block">
                                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $bookmark->title }}</h2>
                                <p class="leading-relaxed mb-1 text-gray-400">{{ $bookmark->description }}</p>
                                <p class="leading-relaxed mb-4 underline text-indigo-500">{{ $bookmark->url}} </p>
                                <p class="leading-relaxed flex gap-2">
                                    @foreach ($bookmark->tags as $tag)
                                    <span class="inline-flex items-center rounded-full bg-green-100 border border-green-400 px-3 py-0.5 text-sm font-medium text-green-800">{{ $tag->title }}</span>
                                    @endforeach
                                </p>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
        </div>

        </div>

    </body>

</html>