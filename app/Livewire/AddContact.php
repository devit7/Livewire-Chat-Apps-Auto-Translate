<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AddContact extends Component
{
    public $inputUserCode;

    public function addContact()
    {
        // Bersihkan input
        $this->inputUserCode = trim($this->inputUserCode);
        
        // Validasi jika input kosong
        if (empty($this->inputUserCode)) {
            $this->dispatch('keep-modal-open', message : 'Kode pengguna tidak boleh kosong.');
            $this->skipRender();
            return;
        }
        //dd($this->inputUserCode);

        // Cari user berdasarkan kode
        $user = User::where('username', $this->inputUserCode)->first();

        // Validasi user code
        if (!$user || $user->id === Auth::id()) {
            $this->dispatch('keep-modal-open', message : 'Kode pengguna tidak valid.');
            $this->skipRender();
            return;
        }

        // Cek jika kontak sudah ada
        if (Contact::where('user_id', Auth::id())->where('contact_id', $user->id)->exists()) {
            $this->dispatch('keep-modal-open', message : 'Kontak sudah ada.');
            $this->skipRender();
            return;
        }

        // Tambahkan kontak baru
        Contact::firstOrCreate([
            'user_id' => Auth::id(),
            'contact_id' => $user->id,
        ]);
        // tambahkan kontak ke user lain
        Contact::firstOrCreate([
            'user_id' => $user->id,
            'contact_id' => Auth::id(),
        ]);

        // Flash message sukses
        //session()->flash('success', 'Kontak berhasil ditambahkan.');
        $this->dispatch('contactRefresh');
    }


    public function render()
    {
        return view('livewire.add-contact');
    }
}
