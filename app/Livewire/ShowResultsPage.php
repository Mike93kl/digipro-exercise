<?php

namespace App\Livewire;

use App\Models\Answer;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowResultsPage extends Component
{

    public array $questions = [];


    public function mount(Request $request)
    {
        $key = $request->route('searchKey');

        if(!$key) {
            redirect('/');
            return;
        }


        $this->questions = Answer::query()
            ->whereHas('owner', fn($q) => $q->where('key', $key))
            ->orderBy('question_index', 'asc')
            ->get()
            ->map(function (Answer $answer) {

                return [
                    'question' => $answer->question,
                    'answered' => $answer->submitted_answer,
                    'correct_answer' => $answer->correct_answer,
                    'correct' => strcasecmp($answer->submitted_answer, $answer->correct_answer) == 0
                ];

            })->values()->toArray();

    }


    public function render()
    {
        return view('livewire.show-results-page');
    }
}
