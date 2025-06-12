<?php

use App\Livewire\PlayQuiz;
use App\Livewire\UserInfoPage;
use App\Models\SearchHistory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

describe('user info form', function () {

    it('should validate user form', function () {

        livewire(UserInfoPage::class)
            ->set('fullName', '')
            ->set('email', '')
            ->set('numberOfQuestions', 1000)
            ->set('difficulty', 'any')
            ->set('type', 'any')
            ->call('submit')
            ->assertHasErrors([
                'email' => 'required',
                'fullName' => 'required',
                'numberOfQuestions' => 'max',
                'difficulty' => 'in',
                'type' => 'in'
            ]);

    });


    it('should submit user form', function () {


        livewire(UserInfoPage::class)
            ->set('fullName', 'mike')
            ->set('email', 'mike@gmail.com')
            ->set('numberOfQuestions', 10)
            ->set('difficulty', 'easy')
            ->set('type', 'boolean')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertRedirect(route('quiz.index', [
                'fullName' => 'mike',
                'email' => 'mike@gmail.com',
                'numberOfQuestions' => '10',
                'difficulty' => 'easy',
                'type' => 'boolean'
            ]));


    });


    it('should load questions', function () {

        Http::fake([
            '*command=request' => Http::response([
                'response_code' => 0,
                'token' => 'token'
            ]),
            '*api.php*' => Http::response([
                'response_code' => 0,
                'results' => [
                    [
                        'category' => 'dummy',
                        'question' => 'what?',
                        'type' => 'boolean',
                        'correct_answer' => 'True',
                        'incorrect_answers' => [
                            'False'
                        ]
                    ],
                    [
                        'category' => 'dummy',
                        'question' => 'what?',
                        'type' => 'boolean',
                        'correct_answer' => 'True',
                        'incorrect_answers' => [
                            'False'
                        ]
                    ],

                ]
            ])
        ]);


        get('play?' . http_build_query([
                'fullName' => 'mike',
                'email' => 'mike@gmail.com',
                'numberOfQuestions' => '10',
                'difficulty' => 'easy',
                'type' => 'boolean'
            ]))->assertOk();


        assertDatabaseHas(SearchHistory::class, [
            'full_name' => 'mike',
            'email' => 'mike@gmail.com',
            'number_of_questions' => '10',
            'difficulty' => 'easy',
            'type' => 'boolean'
        ]);


    });

});
