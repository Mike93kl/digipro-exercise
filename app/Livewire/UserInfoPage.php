<?php

namespace App\Livewire;

use Livewire\Component;

class UserInfoPage extends Component
{

    public array $errors = [];

    public string $fullName = '';

    public string $email = '';

    public string $numberOfQuestions = '0';

    public string $difficulty = '';

    public string $type = '';


    public function yo()
    {
        dd($this->fullName);
    }

    public function render()
    {
        return view('livewire.user-info-page');
    }
}
