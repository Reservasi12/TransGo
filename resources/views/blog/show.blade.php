@extends('layouts.public')

@section('content')
<!-- Article Header -->
<section class="relative z-10 overflow-hidden pb-[60px] pt-[120px] dark:bg-slate-900 md:pt-[150px]">
    <div class="container mx-auto px-4">
        <div class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4 lg:w-8/12">
                <div class="mb-4 text-center">
                    <span class="mb-2 inline-block rounded bg-blue-100 dark:bg-blue-900 px-4 py-1 text-sm font-semibold text-blue-600 dark:text-blue-300">
                        {{ $blog->category ?? 'Berita' }}
                    </span>
                    <h1 class="mb-6 text-3xl font-bold text-black dark:text-white sm:text-4xl md:text-[40px]">
                        {{ $blog->title }}
                    </h1>
                     <div class="flex flex-wrap items-center justify-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <span class="flex items-center gap-2">
                             <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                             {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') : $blog->created_at->format('F d, Y') }}
                        </span>
                        <span class="flex items-center gap-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            {{ $blog->views_count }} Kali Dilihat
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="pb-20 lg:pb-[120px] dark:bg-slate-900">
    <div class="container mx-auto px-4">
        <div class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4 lg:w-8/12">
                <div class="mb-10 w-full overflow-hidden rounded">
                     <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="h-auto w-full object-cover" />
                </div>
                
                <div class="w-full">
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        {!! $blog->content !!}
                    </div>

                    <!-- Tags -->
                    @if($blog->tags)
                    <div class="mt-10 flex flex-wrap gap-2">
                        @foreach(explode(',', $blog->tags) as $tag)
                            <span class="inline-block rounded bg-gray-100 dark:bg-slate-800 px-3 py-1 text-sm font-medium text-gray-800 dark:text-gray-300">
                                #{{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
