@extends('layouts.base-layout')
@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <form method="POST" class="bg-secondary space-y-6 text-gray-600 rounded-lg shadow-lg p-6"
            enctype="multipart/form-data">
            @csrf
            {{ method_field($method ?? 'POST') }}
            <h2>{{ $title }}</h2>
            @if ($errors->any())
                <div class="danger p-1">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <label>
                Názov
                <input class="w-100" type="text" name="title" id="title" required value="{{ $story->title ?? '' }}"
                    oninvalid="this.setCustomValidity('Pole názov je povinné.')" oninput="this.setCustomValidity('')">
            </label>
            <label>Variabilný symbol
                <input class="w-100" type="number" name="reference" id="reference" required
                    value="{{ $story->reference ?? '' }}"
                    oninvalid="this.setCustomValidity('Pole variabilný symbol je povinné.')"
                    oninput="this.setCustomValidity('')">
            </label>
            <label>
                <input type="checkbox" name="is_finished" {{ $story->is_finished ? 'checked' : '' }}>
                Ukončené
            </label>
            <div>
                <label for="content">Text
                    <input id='hidden-content' type="hidden" name="content" value="{{ $story->content ?? '' }}">
                </label>
                <div id="content" class="border-solid border-gray-300 border-2 p-2 h-80 max-h-80 overflow-y-auto"></div>
            </div>
            @if ($enableFiles ?? true)
                <div id="files-wrapper"
                    class="flex flex-col px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md min-h-48">
                    <div id="dropzone" class="mt-1 flex grow justify-around items-center">
                        <label for="images"
                            class="file-upload cursor-pointer bg-white rounded-md font-medium text-primary">
                            Nahraj obrázky kliknutím alebo presunutím sem
                            <input id="images" name="images[]" type="file" multiple class="sr-only">
                        </label>
                    </div>
                </div>
            @endif
            <div class="flex justify-end">
                <button type='submit' class="ml-auto">{{ $btn }}</button>
            </div>
        </form>
    </div>
    <script type="module">
        import {
            Editor
        } from 'https://esm.sh/@tiptap/core'
        import StarterKit from 'https://esm.sh/@tiptap/starter-kit'
        const editor = new Editor({
            element: document.querySelector('#content'),
            extensions: [StarterKit],
            content: document.getElementById('hidden-content').value,
            onUpdate({
                editor
            }) {
                document.getElementById('hidden-content').value = editor.getHTML()
            },
        })
        const imagesInput = document.getElementById('images')

        if (imagesInput) {
            const appendFileNames = files => {
                const prevUl = document.querySelector('#dropzone ul')
                if (prevUl) prevUl.remove()

                const documentList = document.createElement('ul')
                Array.from(files).forEach(({
                    name
                }) => {
                    const el = document.createElement('li')
                    el.textContent = name
                    documentList.appendChild(el)
                })

                if (files.length && !document.getElementById('reset-files')) {
                    const resetButton = document.createElement('button')
                    resetButton.id = 'reset-files'
                    resetButton.textContent = 'Reset'
                    resetButton.type = 'button'
                    resetButton.classList.add('mx-auto', 'bg-transparent', 'text-gray-600', 'cursor-pointer', 'mt-2',
                        'underline')
                    resetButton.addEventListener('click', () => {
                        imagesInput.value = ''
                        documentList.remove()
                        resetButton.remove()
                    })
                    document.getElementById('files-wrapper').appendChild(resetButton)
                }

                document.getElementById('dropzone').appendChild(documentList)
            }
            imagesInput.addEventListener('change', e => appendFileNames(e.target.files))
            document.getElementById('dropzone').addEventListener('dragover', e => e.preventDefault())
            document.getElementById('dropzone').addEventListener('drop', e => {
                e.preventDefault()
                e.stopPropagation()
                const files = e.dataTransfer.files
                imagesInput.files = files
                appendFileNames(files)
            })

        }
    </script>
@endsection
