@extends('layouts.base-layout')
@push('styles')<link href="{{ mix('css/admin.css') }}" rel="stylesheet">@endpush
@section('content')
<div class="card p-3">
  @if ($message ?? null || session()->has('message'))
    <div class="success p-1">{{ $message ?? session('message')}}</div>
  @endif
  <div class="w-100 text-right">
    <a href="/admin/pribeh"><button class="success mr-1">Pridať príbeh</button></a>
  </div>
  <table>
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($stories as $story)
      <tr>
        <td>{{ $story->title }}</td>
        <td style="min-width:150px">{{ $story->created_at ?: 'Neznáme' }}</td>
        <td>
          <a href="/admin/upravit-pribeh?id={{ $story->id }}"><button class="warning">UPRAVIŤ</button></a>
        </td>
        <td>
          <form method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{ $story->id }}">
            <button class="danger">VYMAZAŤ</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection