<?php

namespace App\Contracts;

interface Question
{
    public function getType(): string;

    public function getCategory(): string;

    public function getQuestion(): string;

    public function getAnswers(): array;

    public function getCorrectAnswer(): mixed;

    public function saveAnswer(mixed $answer): void;

    public function isCorrectAnswer(): bool;
}
