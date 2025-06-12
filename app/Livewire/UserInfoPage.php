<?php

namespace App\Livewire;

use Livewire\Component;

class UserInfoPage extends Component
{


    public string $fullName = '';

    public string $email = '';

    public string $numberOfQuestions = '0';

    public string $difficulty = '';

    public string $type = '';

    public array $rules = [
        'fullName' => ['required', 'string'],
        'email' => ['required', 'string', 'email'],
        'numberOfQuestions' => ['required', 'int', 'min:1', 'max:50'],
        'difficulty' => ['required', 'in:easy,medium,hard'],
        'type' => ['required', 'in:multiple,boolean']
    ];

    public function mount(): void
    {
        $this->fullName = '';
        $this->email = '';
        $this->numberOfQuestions = 1;
        $this->difficulty = '';
        $this->type = '';
        session()->forget('searchKey');
    }

    public function submit(): void
    {
        $data = $this->validate();

        redirect()->route('quiz.index', $data);
    }

    public function render()
    {
        return view('livewire.user-info-page');
    }
}
