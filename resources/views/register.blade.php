

@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-bold mb-6">Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="border p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="border p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="border p-2 w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
            </form>
        </div>
    </div>
@endsection
