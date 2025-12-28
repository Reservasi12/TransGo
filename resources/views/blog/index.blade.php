@extends('layouts.public')

@section('content')

<!-- Page Header -->
<section class="relative overflow-hidden bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 py-16 sm:py-20 lg:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center text-white">
            <span class="inline-block px-4 py-2 sm:px-6 sm:py-3 mb-4 sm:mb-6 text-xs sm:text-sm font-black rounded-full bg-white/20 backdrop-blur-sm uppercase tracking-wider">
                Blog & Artikel
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-4 sm:mb-6">
                Tips & Cerita Perjalanan
            </h1>
            <p class="text-base sm:text-lg lg:text-xl text-purple-100">
                Temukan tips perjalanan, panduan transportasi, dan informasi terbaru untuk perjalanan Anda
            </p>
        </div>
    </div>
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
</section>

<!-- Blog Grid -->
<section class="py-12 sm:py-16 lg:py-20 bg-gray-50 dark:bg-slate-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        @if($blogs->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($blogs as $blog)
            <article class="group bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg border-2 border-gray-100 dark:border-slate-700 card-hover-lift">

                <!-- Image -->
                <div class="relative h-56 sm:h-64 overflow-hidden bg-gray-100 dark:bg-slate-700">
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        <img src="{{ $blog->image_url }}"
                             onerror="this.src='https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600';"
                             class="h-full w-full object-cover group-hover:scale-110 transition duration-700"
                             alt="{{ $blog->title }}">
                    </a>

                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-2 bg-purple-600 text-white text-xs font-black rounded-full shadow-lg uppercase">
                            {{ $blog->category ?? 'Travel' }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5 sm:p-6 space-y-4">
                    <!-- Meta -->
                    <div class="flex items-center gap-4 text-xs sm:text-sm text-gray-500 dark:text-gray-400 font-medium">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            {{ $blog->created_at->format('d M Y') }}
                        </span>
                        @if($blog->author)
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            {{ $blog->author->name }}
                        </span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h3 class="text-lg sm:text-xl font-black text-gray-900 dark:text-white leading-snug group-hover:text-purple-600 dark:group-hover:text-purple-400 transition line-clamp-2">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            {{ $blog->title }}
                        </a>
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-3">
                        {{ Str::limit($blog->excerpt, 120) }}
                    </p>

                    <!-- Read More -->
                    <a href="{{ route('blog.show', $blog->slug) }}"
                       class="inline-flex items-center font-bold text-purple-600 hover:text-purple-700 dark:text-purple-400 dark:hover:text-purple-300 group-hover:gap-3 gap-2 transition-all text-sm sm:text-base">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>

            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $blogs->links() }}
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-16 sm:py-20">
            <div class="flex justify-center mb-6">
                <div class="flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24 bg-gray-100 dark:bg-slate-800 rounded-full">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-xl sm:text-2xl font-black text-gray-900 dark:text-white mb-3">Belum Ada Artikel</h3>
            <p class="text-base sm:text-lg text-gray-500 dark:text-gray-400 mb-8">
                Artikel dan tips perjalanan akan segera hadir
            </p>
            <a href="{{ route('home') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 sm:px-8 sm:py-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-xl sm:rounded-2xl shadow-lg hover:shadow-xl hover:from-purple-500 hover:to-indigo-500 transform hover:scale-105 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
        @endif

    </div>
</section>

@endsection
