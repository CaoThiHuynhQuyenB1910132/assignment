<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public int $itemPerPage = 10;

    public function index(): View
    {
        $contacts = Contact::query()
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('admin.contact.index', compact('contacts'));
    }

    public function create(): View
    {
        return view('admin.contact.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $contact = $request->validated();

        Contact::query()->create([
            'name' => $contact['name'],
            'email' => $contact['email'],
            'message' => $contact['message'],
            'phone' => $contact['phone'],
        ]);

        toast('Add Contact Successfully', 'success');

        return redirect('contact');
    }

    public function edit(string $id): View
    {
        $contact = Contact::getContactById($id);

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();

        $contact = Contact::getContactById($id);

        $contact->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'phone' => $data['phone'],
        ]);

        toast('Updated new contact success', 'success');

        return redirect('contact');
    }

    public function delete(string $id): RedirectResponse
    {
        $contact = Contact::getContactById($id);

        $contact->delete();

        toast('Deleted Contact', 'success');

        return redirect('contact');
    }
}
