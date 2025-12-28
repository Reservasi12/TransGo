@extends('layouts.admin')

@section('styles')
<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Tom Select CSS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<style>
    .ql-container {
        border-bottom-left-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        background-color: transparent;
    }
    .ql-toolbar {
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        background-color: #f8f9fa;
    }
    .dark .ql-toolbar {
        background-color: #1e293b;
        border-color: #334155;
    }
    .dark .ql-container {
        border-color: #334155;
    }
    .dark .ql-editor {
        color: #f8f9fa;
    }
    .dark .ts-control {
        background-color: #334155;
        border-color: #475569;
        color: #f8f9fa;
    }
</style>
@endsection

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Buat Postingan Blog
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
             <li><a class="font-medium" href="{{ route('admin.blogs.index') }}">Blog /</a></li>
            <li class="font-medium text-blue-600">Buat</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
    <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
        <h3 class="font-medium text-black dark:text-white">
            Form Blog
        </h3>
    </div>
    <form id="blogForm" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-6.5">
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Judul <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul postingan"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Kategori
                </label>
                <select id="category" name="category" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">
                    <option value="">Pilih Kategori</option>
                    <option value="Berita" {{ old('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                    <option value="Destinasi" {{ old('category') == 'Destinasi' ? 'selected' : '' }}>Destinasi</option>
                    <option value="Tips & Trik" {{ old('category') == 'Tips & Trik' ? 'selected' : '' }}>Tips & Trik</option>
                    <option value="Pengumuman" {{ old('category') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="Promo" {{ old('category') == 'Promo' ? 'selected' : '' }}>Promo</option>
                </select>
            </div>
            
             <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Ringkasan (Excerpt)
                </label>
                <textarea rows="2" name="excerpt" placeholder="Ringkasan singkat..."
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">{{ old('excerpt') }}</textarea>
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Konten <span class="text-red-500">*</span>
                </label>
                <div id="editor" class="min-h-[300px]"></div>
                <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Gambar Unggulan
                </label>
                <input type="file" name="featured_image"
                    class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-medium outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-3 file:px-5 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:file:border-slate-600 dark:file:bg-white/30 dark:file:text-white dark:focus:border-blue-500" />
                 <p class="mt-2 text-sm text-gray-500">Atau masukkan URL gambar:</p>
                 <input type="text" name="featured_image_url" value="{{ old('featured_image_url') }}" placeholder="https://example.com/image.jpg"
                    class="mt-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-2 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" />
                 @error('featured_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                 @error('featured_image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Tag
                </label>
                <select id="tags" name="tags[]" multiple placeholder="Pilih tag..." autocomplete="off"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">
                    <option value="Travel" {{ in_array('Travel', (array)old('tags', [])) ? 'selected' : '' }}>Travel</option>
                    <option value="Tips" {{ in_array('Tips', (array)old('tags', [])) ? 'selected' : '' }}>Tips</option>
                    <option value="Wisata" {{ in_array('Wisata', (array)old('tags', [])) ? 'selected' : '' }}>Wisata</option>
                    <option value="Transportasi" {{ in_array('Transportasi', (array)old('tags', [])) ? 'selected' : '' }}>Transportasi</option>
                    <option value="Keamanan" {{ in_array('Keamanan', (array)old('tags', [])) ? 'selected' : '' }}>Keamanan</option>
                    <option value="Promo" {{ in_array('Promo', (array)old('tags', [])) ? 'selected' : '' }}>Promo</option>
                    <option value="Berita" {{ in_array('Berita', (array)old('tags', [])) ? 'selected' : '' }}>Berita</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="mb-2.5 block text-black dark:text-white">
                    Status Publikasi
                </label>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600 rounded">
                    <span class="text-black dark:text-white">Terbitkan Segera</span>
                </div>
            </div>

            <button type="submit" class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-white hover:bg-opacity-90">
                Buat Postingan
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<!-- Tom Select JS -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'blockquote', 'code-block'],
                    ['clean']
                ]
            }
        });

        // Set initial content if exists
        var initialContent = document.getElementById('content').value;
        if (initialContent) {
            quill.root.innerHTML = initialContent;
        }

        // Initialize Tom Select
        var settings = {
            plugins: ['remove_button'],
            create: false,
        };
        new TomSelect('#tags', settings);

        // Sync Quill content to hidden input before submit
        var form = document.getElementById('blogForm');
        form.onsubmit = function() {
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
