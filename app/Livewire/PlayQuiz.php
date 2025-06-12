<?php

namespace App\Livewire;

use App\Contracts\Question;
use App\DTO\BooleanQuestion;
use App\DTO\MultipleQuestion;
use App\Models\Answer;
use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;

class PlayQuiz extends Component
{

    private $objectQuestions = [];
    public array $questions = [];
    public int $index = 0;
    public bool $showFinish = false;
    public bool $hasNext = false;
    public bool $hasPrev = false;

    public int $numOfQuestions = 0;

    private string $difficulty = '';
    private string $type = '';

    private string $token = '';

    private $lastApicall = null;

    private ?SearchHistory $searchHistory = null;

    public function mount(Request $request): void
    {

        session()->forget('searchKey');

        $validator = Validator::make($request->all(), [
            'fullName' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'numberOfQuestions' => ['required', 'int', 'min:1', 'max:50'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'type' => ['required', 'in:multiple,boolean']
        ]);

        if ($validator->fails()) {
            redirect('/');
            return;
        }

        [$fullName, $email, $numberOfQuestions, $difficulty, $type] = array_values($request->only(
            'fullName',
            'email',
            'numberOfQuestions',
            'difficulty',
            'type'
        ));

        $tokenResponse = Http::get('https://opentdb.com/api_token.php?command=request');

        if (!$tokenResponse->successful() || $tokenResponse->json('response_code', 1) != 0) {
            session()->flash('error', 'Could not fetch questions at the moment please try again later');
            redirect('/');
            return;
        }

        $token = $tokenResponse->json('token');

        $this->numOfQuestions = $numberOfQuestions;
        $this->difficulty = $difficulty;
        $this->type = $type;
        $this->token = $token;


        $this->fillQuestions();

        $searchKey = Str::uuid7()->toString();

        SearchHistory::query()->create([
            'full_name' => $fullName,
            'email' => $email,
            'number_of_questions' => $numberOfQuestions,
            'difficulty' => $difficulty,
            'type' => $type,
            'key' => $searchKey
        ]);

        session()->put('searchKey', $searchKey);


        $this->hasNext = count($this->questions) > 0;
        $this->showFinish = $this->index >= count($this->questions) - 1;

    }


    private function fillQuestions(bool $silent = false): void
    {
        if ($this->numOfQuestions != 0 && count($this->questions) >= $this->numOfQuestions) {
            return;
        }

        if ($this->lastApicall && now()->diffInSeconds($this->lastApicall) < 5) {
            return;
        }


        $response = Http::get('https://opentdb.com/api.php', [
            'amount' => '50',
            'difficulty' => $this->difficulty,
            'type' => $this->type,
            'token' => $this->token
        ]);

        if (!$response->successful() || $response->json('response_code', 1) != 0) {

            if ($silent) {
                return;
            }

            session()->flash('error', 'Error fetching questions, Please try again later');
            redirect('/');
            return;
        }

        $take = abs(count($this->questions) - $this->numOfQuestions);

        $questions = collect($response->json('results'))
            ->filter(fn(array $q) => strcasecmp($q['category'], 'Entertainment: Video Games') != 0)
            ->take($take)
            ->map(function (array $question) {

                return match (strtolower($question['type'])) {
                    'multiple' => new MultipleQuestion($question['question'], 'multiple', $question['category'], $question['incorrect_answers'], $question['correct_answer']),
                    default => new BooleanQuestion($question['question'], 'multiple', $question['category'], $question['correct_answer'])
                };

            })
            ->values()->toArray();

        $this->questions = collect($this->questions)->merge($questions)->toArray();

        $this->lastApicall = now();

    }

    public function submitAnswer($ans): void
    {
        $this->questions[$this->index]['submitted_answer'] = $ans;

        $key = session()->get('searchKey');

        $history = SearchHistory::query()->where('key', $key)->first();

        if(!$history) {
            session()->flash('error', 'Something went wrong');
            redirect('/');
            return;
        }

        $question = $this->questions[$this->index];

        Answer::query()->upsert([
            'search_id' => $history->id,
            'question_index' => $this->index,
            'question' => $question['question'],
            'submitted_answer' => $ans,
            'correct_answer' => $question['correct_answer'] ?? '',
            'possible_answers' => json_encode($question['answers'])
        ], ['search_id', 'question_index'], [
            'submitted_answer'
        ]);

        $this->fillQuestions(true);

        if($this->showFinish) {
            $this->finish();
            return;
        }

        $this->next();
    }

    public function syncQuestions(): void
    {
        $this->questions = collect($this->objectQuestions)->toArray();
    }

    public function getCurrent(): Question
    {
        return $this->questions[$this->index];
    }

    public function next(): void
    {
        if ($this->index < count($this->questions) - 1) {
            $this->index++;
        }

        $this->hasNext = $this->index < count($this->questions) - 1;
        $this->hasPrev = $this->index > 0;
        $this->showFinish = $this->index >= count($this->questions) - 1;
    }

    public function previous(): void
    {
        if ($this->index > 0) {
            $this->index--;
        }
        $this->hasPrev = $this->index > 0;
        $this->hasNext = $this->index < count($this->questions) - 1;
        $this->showFinish = $this->index >= count($this->questions) - 1;
    }

    public function render()
    {
        return view('livewire.play-quiz');
    }

    public function finish(): void
    {
        $allAnswered = collect($this->questions)->filter(fn(array $q) => empty($q['submitted_answer'] ?? 0))->isEmpty();

        if (!$allAnswered) {
            session()->flash('error', 'Please complete all the answers first');
            return;
        }

        redirect()->route('quiz.show', ['searchKey' => session()->get('searchKey', '')]);

    }
}
