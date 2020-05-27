<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $search, $statusUpdate = false;

    protected $listeners = [
        'contactStored',
        'contactUpdated'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => Contact::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(5)
        ]);
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::findOrFail($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if ($id) {
            $contact = Contact::find($id);
            $contact->delete();
            session()->flash('message', 'Contact was deleted!');
        }
    }

    public function contactStored($new_contact)
    {
        session()->flash('message', 'Contact '. $new_contact['name'] .' was stored!');
    }

    public function contactUpdated($updt_contact)
    {
        $this->statusUpdate = false;
        session()->flash('message', 'Contact ' . $updt_contact['name'] . ' was updated!');
    }
}
