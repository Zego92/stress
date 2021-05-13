<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $contacts = Contact::with('language')
            ->paginate(10);
        return view('admin.contact.index')
            ->with('languages', $languages)
            ->with('contacts', $contacts);
    }

    public function store(Request $request)
    {
        Contact::create([
            'language_id' => $request->language_id,
            'firstPhone' => $request->firstPhone,
            'secondPhone' => $request->secondPhone,
            'thirdPhone' => $request->thirdPhone,
            'address' => $request->address,
            'startTimeWork' => $request->startTimeWork,
            'endTimeWork' => $request->endTimeWork,
            'email' => $request->email,
            'gMapLink' => $request->gMapLink,
        ]);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
