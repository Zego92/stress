<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUpdateRequest;
use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        Contact::create($data);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Contact $contact)
    {
        $languages = Language::all();
        return view('admin.contact.show')
            ->with('contact', $contact)
            ->with('languages', $languages);
    }

    public function update(ContactUpdateRequest $request, Contact $contact): RedirectResponse
    {
        $data = $request->all();
        $contact->update($data);
        return redirect()->route('admin.contacts.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        try {
            $contact->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
