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

        <div class="bg-white rounded-lg shadow-md text-center">
            <div class="p-6 border-b">
                <h5 class="text-lg font-semibold">Welcome to Address Book System</h5>
            </div>

            <div class="p-6 flex flex-col items-center gap-3">
                <h5 class="text-lg font-medium mb-3">Please select an option:</h5>
                <a href="{{ route('contacts.create') }}" class="w-full max-w-xs bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-center">1. Add new contact.</a>
                <a href="{{ route('contacts.search.name.view') }}" class="w-full max-w-xs bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-center">2. Search by name.</a>
                <a href="{{ route('contacts.search.phone.view') }}" class="w-full max-w-xs bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded text-center">3. Search by number.</a>
                <a href="{{ route('contacts.delete.name.view') }}" class="w-full max-w-xs bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-center">4. Delete contact by name.</a>
                <a href="{{ route('contacts.delete.phone.view') }}" class="w-full max-w-xs bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded text-center">5. Delete contact by number.</a>
                <a href="{{ route('contacts.index') }}" class="w-full max-w-xs bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded text-center">6. Show all contacts.</a>
                <a href="{{ route('contacts.exit') }}" class="w-full max-w-xs bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-center">7. Exit</a>
            </div>
        </div>
    </div>
@endsection
