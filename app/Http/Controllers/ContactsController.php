<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:contacts',
            'type' => 'required|in:Family,Personal,Work,Other',
        ]);

        try {
            Contacts::create($validatedData);
            return redirect()->route('home')->with('success', 'Contact created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to create contact: ' . $th->getMessage());
        }

    }

    public function searchByNameview()
    {
        return view('contacts.searchbyname');
    }
    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        $contacts = Contacts::where('name', 'like', '%' . $name . '%')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function searchByPhoneview()
    {
        return view('contacts.searchbyphone');
    }

    public function searchByPhone(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $contacts = Contacts::where('phone_number', 'like', '%' . $phone_number . '%')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function destroyByName(Request $request)
    {
        $name = $request->input('name');
        $content = Contacts::where('name', $name)->exists();
        if ($content) {
            Contacts::where('name', $name)->delete();
            return redirect()->route('home')->with('success', 'Contact deleted successfully.');
        }
        return redirect()->route('home')->with('error', 'Contact not found.');
    }

    public function destroyByPhone(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $content = Contacts::where('phone_number', $phone_number)->exists();
        if ($content) {
            Contacts::where('phone_number', $phone_number)->delete();
            return redirect()->route('home')->with('success', 'Contact deleted successfully.');
        }
        return redirect()->route('home')->with('error', 'Contact not found.');
    }

    public function destroyByNameview()
    {
        return view('contacts.deletebyname');
    }

    public function destroyByPhoneview()
    {
        return view('contacts.deletebyphone');
    }

    public function exit()
    {
        return redirect('/');
    }
}
