<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Throwable;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::search($request->input('search'))
            ->with('numbers')
            ->latest()
            ->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show(Contact $contact)
    {
        $contact->load('numbers');
        return view('contacts.show', compact('contact'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'numbers.*.phone_number' => 'nullable|max:10|distinct',
            'numbers.*.type' => 'required_with:numbers.*.phone_number'
        ]);

        try {
            DB::beginTransaction();

            $contact = Contact::create([
                'name' => $validated['name'],
            ]);

            $numbers = collect($request->input('numbers', []))
                ->filter(fn($item) => !empty($item['phone_number']));

            if ($numbers->isNotEmpty()) {
                $contact->numbers()->createMany($numbers->toArray());
            }

            DB::commit();
            return redirect()->back()->with('success', 'Contact added successfully.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function exit()
    {
        return redirect('/');
    }
}
