@extends('layouts.base-layout')
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Admin navigation tabs -->
        <div class="mb-6 flex border-b border-gray-200">
            <a href="/admin" class="px-6 py-3 bg-primary text-primary-text rounded-t-lg font-medium">Príbehy</a>
            <a href="/admin/albums" class="px-6 py-3 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-t-lg font-medium ml-2">Galéria</a>
        </div>
        
        <div class="bg-secondary rounded-lg shadow-lg p-6">
            @if ($message ?? null || session()->has('message'))
                <div class="bg-success-light text-success p-4 rounded mb-4">
                    {{ $message ?? session('message') }}
                </div>
            @endif

            <div class="text-right mb-4">
                <a href="/admin/pribeh">
                    <button class="bg-success hover:bg-success/90 text-success-text">Pridať príbeh</button>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-gray-700">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Názov
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dátum
                            </th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($stories as $story)
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="px-6 py-4">{{ $story->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $story->created_at ?: 'Neznáme' }}</td>
                                <td class="px-6 py-4 flex items-center justify-end gap-4">
                                    <a href="/admin/upravit-pribeh?id={{ $story->id }}" class="block">
                                        <button class="bg-warning hover:bg-warning/90 text-warning-text">UPRAVIŤ</button>
                                    </a>
                                    <form method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" value="{{ $story->id }}">
                                        <button class="bg-danger hover:bg-danger/90 text-danger-text">VYMAZAŤ</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
