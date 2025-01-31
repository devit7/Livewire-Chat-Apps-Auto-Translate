<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchContact extends Component
{
    public $search;

    public function cariKontak()
    {
        //dd($this->search);

        if (!$this->search) {
            $this->dispatch('contactRefresh');
            return;
        }
         
        $dataNama = Contact::where('user_id', Auth::id())
            ->whereHas('contact', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();
        //dd($dataNama);
        $this->dispatch('contactFound', dataNama: $dataNama);
    }

    public function render()
    {
        return view('livewire.search-contact');
    }
}
