<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ContactList extends Component
{
    public $contacts;
    public $name;

    #[On('contactRefresh')]
    public function mount()
    {
        $this->contacts = Contact::where('user_id', Auth::id())
            ->with('contact')
            ->get();
    }

    #[On('contactFound')]
    public function updatedSearch($dataNama)
    {
        //dd($dataNama);
        $this->contacts = $dataNama;
    }

    public function render()
    {
       /*  return dd($this->contacts); */
        return view('livewire.contact-list', [
            'contacts' => $this->contacts,
        ]);
    }
}
