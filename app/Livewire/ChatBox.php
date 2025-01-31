<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Tlanguage;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatBox extends Component
{
    public $receiverId;
    public $receiverExists = false;
    public $messages = [];
    public $newMessage;
    public $dataUserDiChat;
    private $apiTranslateMessage = 'https://script.google.com/macros/s/AKfycbyTKL2B1YEcC8z8DXINmO1iPrfRrCogVnvTvuUkIwTFm47UGJerV3WoilurixRfJQ3Rdg/exec';
    public $messageAfterTranslate = [];
    public $loading = false;

    # Load chat based on receiver ID
    #[On('openChat')]
    public function loadChat($receiverId)
    {
        $checkContact = $this->checkContact($receiverId);
        if (!$checkContact) {
            $this->dataUserDiChat = null;
            $this->receiverExists = false;
            $this->dispatch('contactRefresh');
            return;
        }
        //return dd($receiverId);
        $this->receiverId = $receiverId;
        $this->receiverExists = true;
        $this->loadMessages();
        $this->loadUserDiChat($receiverId);
        //$this->dispatch('chat-open');
    }

    public function loadMessages()
    {
        $this->messages = Message::where(function ($query) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $this->receiverId);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiverId)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    }

    public function updatedReceiverId()
    {
        $this->receiverExists = false;
        $this->messages = [];
    }

    public function loadUserDiChat($receiverId)
    {

        $this->dataUserDiChat = User::find($receiverId);
        //dd($this->dataUserDiChat);
    }

    public function checkContact($receiverId)
    {
        $contact = Contact::where('user_id', Auth::id())
            ->where('contact_id', $receiverId)
            ->exists();
        //dd($contact);
        return $contact;
    }


    public function sendMessage()
    {

        $checkContact = $this->checkContact($this->receiverId);
        if (!$checkContact) {
            $this->dataUserDiChat = null;
            $this->receiverExists = false;
            $this->dispatch('contactRefresh');
            return;
        }
        if ($this->newMessage) {
            Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $this->receiverId,
                'message' => $this->newMessage,
            ]);
            $this->newMessage = '';
            $this->loadMessages();
        }
    }

    #[On('openTranslate')]
    public function translateText($message, $id)
    {

        $targetLang = Tlanguage::where('user_id', Auth::id())->first()->targetLang;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($this->apiTranslateMessage, [
            'text' => $message['message'],
            'target_lang' => $targetLang,
        ]);

        // Cek jika berhasil
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            // get translated_text
            $dataText = [
                'id' => $id['messageId'],
                'message' => $data['translated_text']
            ];

            // jika messageAfterTranslate kosong
            if (empty($this->messageAfterTranslate)) {
                $this->messageAfterTranslate[] = $dataText;
            } else {
                // jika messageAfterTranslate tidak kosong maka hapus data lama
                $this->messageAfterTranslate = [];
                $this->messageAfterTranslate[] = $dataText;
            }
        }

        // Jika gagal
        return [
            'error' => 'Terjadi kesalahan dalam menerjemahkan teks.'
        ];
    }

    //hapus kontak
    public function hapusKontak($receiverId)
    {
        //dd($receiverId);
        Contact::where('user_id', Auth::id())
            ->where('contact_id', $receiverId)
            ->delete();
        Contact::where('user_id', $receiverId)
            ->where('contact_id', Auth::id())
            ->delete();

        // delete chat
        Message::where('sender_id', Auth::id())
            ->where('receiver_id', $receiverId)
            ->delete();
        Message::where('sender_id', $receiverId)
            ->where('receiver_id', Auth::id())
            ->delete();

        $this->receiverExists = false;
        $this->messages = [];
        $this->dispatch('contactRefresh');
    }

    public function render()
    {
        return view('livewire.chat-box');
    }
}
