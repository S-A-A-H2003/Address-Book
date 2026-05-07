@extends('Layout.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md">
            <div class="flex justify-between items-center p-6 border-b">
                <h5 class="text-lg font-semibold">Delete Contact by Name</h5>
                <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Back to Home</a>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('contacts.delete.name') }}">
                    @csrf
                    @method('DELETE')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium mb-2">Enter Name</label>
                        <input type="text" class="w-full border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" placeholder="Enter contact name to delete..." value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                        <strong>Warning:</strong> This action will delete all contacts with this name. This cannot be undone.
                    </div>

                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection