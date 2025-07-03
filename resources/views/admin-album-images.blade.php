@extends('layouts.base-layout')
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-secondary rounded-lg shadow-lg p-6">
            @if ($message ?? null || session()->has('message'))
                <div class="bg-success-light text-success p-4 rounded mb-4">
                    {{ $message ?? session('message') }}
                </div>
            @endif

            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold text-tertiary">{{ $album->title }} - Správa fotografií</h1>
                    <a href="/admin/albums">
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-800">Späť na albumy</button>
                    </a>
                </div>
                <div class="text-gray-700 mb-4">
                    <p>Dátum: {{ $album->campaign_date->format('d.m.Y') }}</p>
                    @if($album->description)
                        <p class="mt-2">{{ $album->description }}</p>
                    @endif
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-sm mb-8">
                <h2 class="text-xl font-semibold mb-4">Pridať nové fotografie</h2>
                <form method="POST" action="/admin/albums/{{ $album->id }}/images/upload" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="mb-4">
                        <div class="flex items-center">
                            <label for="imageInput" class="bg-primary hover:bg-primary/90 text-primary-text py-2 px-4 rounded cursor-pointer">
                                Vybrať súbory
                            </label>
                            <span id="fileInputText" class="ml-3 text-gray-600 text-sm">Neboli vybrané žiadne súbory</span>
                        </div>
                        <input type="file" name="images[]" id="imageInput" multiple accept="image/*" class="hidden" required>
                    </div>
                    
                    <div id="imagePreviewContainer" class="mt-4 mb-4 hidden">
                        <h3 class="text-gray-700 font-medium mb-2">Náhľad vybraných súborov:</h3>
                        <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-4 gap-3"></div>
                        <p id="fileCount" class="mt-2 text-gray-500 text-sm"></p>
                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="bg-success hover:bg-success/90 text-success-text">Nahrať fotografie</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="bg-danger-light text-danger p-4 rounded mt-4">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            @if($album->galleryImages->count() > 0)
                <h2 class="text-xl font-semibold mb-4">Fotografie v albume ({{ $album->galleryImages->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($album->galleryImages as $image)
                        <div class="bg-white rounded-lg overflow-hidden shadow-sm">
                            <img src="{{ asset($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <form method="POST" action="/admin/albums/{{ $album->id }}/images/{{ $image->id }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="block text-gray-700 text-sm mb-1">Názov</label>
                                        <input type="text" name="title" value="{{ $image->title }}" 
                                               class="w-full rounded border-gray-300 text-gray-800" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="block text-gray-700 text-sm mb-1">Popis</label>
                                        <textarea name="description" rows="2" 
                                                  class="w-full rounded border-gray-300 text-gray-800">{{ $image->description }}</textarea>
                                    </div>
                                    <div class="flex justify-between items-center mt-4">
                                        <button type="submit" class="bg-primary hover:bg-primary/90 text-primary-text text-xs px-3 py-1">
                                            Uložiť zmeny
                                        </button>
                                        
                                        <button type="button" class="bg-danger hover:bg-danger/90 text-danger-text text-xs px-3 py-1"
                                                onclick="if(confirm('Naozaj chcete vymazať túto fotografiu?')) { 
                                                    document.getElementById('delete-form-{{ $image->id }}').submit(); 
                                                }">
                                            Vymazať
                                        </button>
                                    </div>
                                </form>
                                
                                <form id="delete-form-{{ $image->id }}" method="POST" action="/admin/albums/{{ $album->id }}/images/{{ $image->id }}/delete" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-100 p-8 rounded-lg text-center text-gray-600">
                    <p>Album zatiaľ neobsahuje žiadne fotografie.</p>
                    <p class="mt-2 text-sm">Použite formulár vyššie na pridanie fotografií do tohto albumu.</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('imageInput');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePreview = document.getElementById('imagePreview');
            const fileCount = document.getElementById('fileCount');
            const fileInputText = document.getElementById('fileInputText');
            let selectedFiles = new DataTransfer(); // For storing the filtered file list
            
            imageInput.addEventListener('change', function() {
                // Store the selected files
                Array.from(this.files).forEach(file => {
                    selectedFiles.items.add(file);
                });
                
                // Update preview
                updateImagePreviews();
            });
            
            function updateImagePreviews() {
                // Clear previous preview
                imagePreview.innerHTML = '';
                
                const files = selectedFiles.files;
                
                if (files.length > 0) {
                    imagePreviewContainer.classList.remove('hidden');
                    
                    // Update file input text
                    fileInputText.textContent = files.length === 1 
                        ? '1 súbor vybraný' 
                        : `${files.length} súborov vybraných`;
                    
                    // Update file count text
                    fileCount.textContent = `Vybraných ${files.length} súborov`;
                    
                    // Generate previews (limit to first 12 for performance)
                    const filesToShow = Array.from(files).slice(0, 12);
                    
                    filesToShow.forEach((file, index) => {
                        // Create container for each preview
                        const previewContainer = document.createElement('div');
                        previewContainer.className = 'relative border rounded p-1';
                        previewContainer.dataset.fileIndex = index;
                        
                        if (file.type.startsWith('image/')) {
                            // Create image preview
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.className = 'h-24 w-full object-cover rounded';
                                previewContainer.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        }
                        
                        // Add remove button
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'absolute top-1 right-1 bg-danger text-white rounded-full w-6 h-6 flex items-center justify-center text-xs';
                        removeBtn.innerHTML = '&times;';
                        removeBtn.type = 'button';
                        removeBtn.addEventListener('click', function() {
                            removeFile(index);
                        });
                        previewContainer.appendChild(removeBtn);
                        
                        // Add filename below preview
                        const fileInfo = document.createElement('div');
                        fileInfo.className = 'mt-1 text-xs text-gray-600 truncate pr-6'; // Added padding for the button
                        fileInfo.textContent = file.name;
                        previewContainer.appendChild(fileInfo);
                        
                        imagePreview.appendChild(previewContainer);
                    });
                    
                    // Add note if more files are selected than shown
                    if (files.length > 12) {
                        const moreFiles = document.createElement('div');
                        moreFiles.className = 'col-span-full text-sm text-gray-500 mt-2';
                        moreFiles.textContent = `...a ďalších ${files.length - 12} súborov`;
                        imagePreview.appendChild(moreFiles);
                    }
                } else {
                    imagePreviewContainer.classList.add('hidden');
                    imageInput.value = ''; // Clear the file input if no files are selected
                    fileInputText.textContent = 'Neboli vybrané žiadne súbory';
                }
                
                // Update the actual file input
                imageInput.files = selectedFiles.files;
            }
            
            function removeFile(index) {
                // Create a new DataTransfer object to manipulate the files
                const newFilesList = new DataTransfer();
                
                // Add all files except the one to be removed
                Array.from(selectedFiles.files).forEach((file, i) => {
                    if (i !== index) {
                        newFilesList.items.add(file);
                    }
                });
                
                // Update the selected files
                selectedFiles = newFilesList;
                
                // Update preview
                updateImagePreviews();
            }
        });
    </script>
@endsection