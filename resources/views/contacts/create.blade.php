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
                <h5 class="text-lg font-semibold">Create Contact</h5>
                <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Back to Home</a>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('contacts.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" class="w-full border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium mb-2">Phone</label>
                        <input type="text" class="w-full border {{ $errors->has('phone_number') ? 'border-red-500' : 'border-gray-300' }} rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                        @error('phone_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium mb-2">Type</label>
                        <select class="w-full border {{ $errors->has('type') ? 'border-red-500' : 'border-gray-300' }} rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="type" name="type">
                            <option value="Personal" {{ old('type') == 'Personal' ? 'selected' : '' }}>Personal</option>
                            <option value="Work" {{ old('type') == 'Work' ? 'selected' : '' }}>Work</option>
                            <option value="Family" {{ old('type') == 'Family' ? 'selected' : '' }}>Family</option>
                            <option value="Other" {{ old('type', 'Other') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection