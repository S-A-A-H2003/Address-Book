@extends('Layout.app')
@section('content')
<div class="container mx-auto py-8 flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold mb-4">Welcome to Address Book System</h1>
    <p class="text-lg mb-6">Manage your contacts efficiently and effortlessly.</p>
    <a href="{{ route('home') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition">Start Now</a>
</div>

@endsection
