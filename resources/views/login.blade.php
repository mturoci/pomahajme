@extends('layouts.base-layout')
@section('content')
    <div class="min-h-[calc(100vh-theme(spacing.nav)-theme(spacing.footer))] flex items-center justify-center px-4 py-8">
        <form method="post" class="w-full max-w-md bg-secondary rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-tertiary mb-6">Prihlásenie</h2>

            @if ($errors->any())
                <div class="bg-danger-light text-danger p-4 rounded mb-6">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @csrf
            <div class="space-y-4 text-gray-700">
                <div>
                    <label for="email" class="font-medium">Email</label>
                    <input type="text" name="email" id="email" required class="mt-1"
                        oninvalid="this.setCustomValidity('Pole email je povinné.')" oninput="this.setCustomValidity('')">
                </div>

                <div>
                    <label for="pass" class="font-medium">Heslo</label>
                    <input type="password" name="password" id="pass" required class="mt-1"
                        oninvalid="this.setCustomValidity('Pole heslo je povinné.')" oninput="this.setCustomValidity('')">
                </div>

                <button type="submit" class="w-full">Prihlásiť sa</button>
            </div>
        </form>
    </div>
@endsection
