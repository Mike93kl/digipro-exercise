<?php

namespace App\DTO;


class BooleanQuestion extends Question
{

    public function __construct(string $question, string $type, string $category, public readonly string $correctAnswer)
    {
        parent::__construct($question, $type, $category);
    }

    public function getAnswers(): array
    {
        return ['False', 'True'];
    }

    public function getCorrectAnswer(): mixed
    {
        return $this->correctAnswer;
    }
}
