<?php

namespace App\DTO;

class MultipleQuestion extends Question
{

    public function __construct(string $question, string $type, string $category, public array $incorrectAnswers, public string $correctAnswer)
    {
        parent::__construct($question, $type, $category);
    }


    public function getAnswers(): array
    {
        $qs = $this->incorrectAnswers;
        $randomIndex = rand(0, count($qs));
        array_splice($qs, $randomIndex, 0, $this->correctAnswer);
        return $qs;
    }

    public function getCorrectAnswer(): mixed
    {
        return $this->correctAnswer;
    }
}
