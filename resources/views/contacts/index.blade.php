@extends('Layout.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
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
                <h5 class="text-lg font-semibold">All Contacts</h5>
                <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Back to Home</a>
            </div>

            <div class="p-6">
                @if($contacts->count() > 0)
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">#</th>
                                <th class="text-left py-2">Name</th>
                                <th class="text-left py-2">Phone Number</th>
                                <th class="text-left py-2">Type</th>
                                <th class="text-left py-2">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr class="border-b">
                                    <td class="py-2">{{ $loop->iteration }}</td>
                                    <td class="py-2">{{ $contact->name }}</td>
                                    <td class="py-2">{{ $contact->phone_number }}</td>
                                    <td class="py-2">
                                        <span class="px-2 py-1 text-xs rounded
                                            {{ $contact->type == 'Family' ? 'bg-green-100 text-green-800' : ($contact->type == 'Work' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $contact->type }}
                                        </span>
                                    </td>
                                    <td class="py-2">{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                        No contacts found.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection