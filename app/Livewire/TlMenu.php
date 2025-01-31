<?php

namespace App\Livewire;

use App\Models\Tlanguage;
use Livewire\Component;

class TlMenu extends Component
{
    public $languages ;
    public $data;
    public $langFromDb;

    public function mount()
    {
        $this->getDataFromJsonFile();
        $this->getNowLanguage();
    }

    public function getDataFromJsonFile()
    {
        // amabil isi file json dari public/language.json
        $this->data = json_decode(file_get_contents(public_path('language.json')), true);
    }

    public function getNowLanguage()
    {
        $this->langFromDb = Tlanguage::where('user_id', auth()->id())->first();
        if ($this->langFromDb) {
            $this->languages = $this->langFromDb->targetLang;
        } else {
            $this->languages = 'en';
        }
    }

    public function changeLanguage()
    {
       // dd($this->languages);
        Tlanguage::where('user_id', auth()->id())->update([
            'targetLang' => $this->languages
        ]);
    }

    public function render()
    {
        return view('livewire.tl-menu');
    }
}
