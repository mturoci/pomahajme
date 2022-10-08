@extends('layouts.base-layout')
@push('styles')
<link async href="{{ mix('css/admin-story.css') }}" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
@section('content')
<form method="POST" class="p-2 card" enctype="multipart/form-data">
  @csrf
  {{ method_field($method ?? "POST") }}
  <h2>{{ $title }}</h2>
  @if ($errors->any())
  <div class="danger p-1">
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
  </div>
  @endif
  <label for="title">Názov</label>
  <input class="w-100" type="text" name="title" id="title" required value="{{$story->title ?? ''}}"
    oninvalid="this.setCustomValidity('Pole názov je povinné.')" oninput="this.setCustomValidity('')">
  <label for="content">Text</label>
  <input id='hidden-content' type="hidden" name="content" value="{{ $story->content ?? '' }}">
  <div id="content">{{ $story->content ?? '' }}</div>
  @if ($enableFiles ?? true)
  <label class="file-upload" for="images">Obrázky
    <input type="file" multiple name="images[]" id="images">
  </label>
  @endif
  <button class="sucess">{{ $btn }}</button>
</form>
<script>
  const quill = new Quill('#content', { theme: 'snow' })
  quill.on('text-change', () => document.getElementById('hidden-content').value = quill.getText())
  const appendFileNames = files => {
    $('.file-upload div').remove()
    Array.from(files).forEach(({name}) => {
        const el = document.createElement('div')
        el.appendChild(document.createTextNode(name))
        $('.file-upload').append(el)
    })
  }
  $('.file-upload')
    .on('change', e => appendFileNames(e.originalEvent.target.files))
    .on('dragover', function(e) {
      e.preventDefault()
      e.stopPropagation()
      $(this).addClass('file-upload--dragging')
    })
    .on('dragleave', function(e) {
      $(this).removeClass('file-upload--dragging')
    })
    .on('drop', function (e) {
      e.preventDefault()
      e.stopPropagation()
      $(this).removeClass('file-upload--dragging')
      const files = e.originalEvent.dataTransfer.files
      document.getElementById('images').files = files
      appendFileNames(files)
    })
</script>
@endsection