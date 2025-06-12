<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

abstract class Question implements \App\Contracts\Question, Arrayable, \ArrayAccess
{

    public ?string $submittedAnswer = null;

    public function __construct(
        public readonly string $question,
        public readonly string $type, public readonly string $category)
    {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCategory(): string
    {
        return $this->category;
    }


    public function getQuestion(): string
    {
        return $this->question;
    }

    public function saveAnswer(mixed $answer): void
    {
        $this->submittedAnswer = $answer;
    }

    public function isCorrectAnswer(): bool
    {
        return $this->submittedAnswer == $this->getCorrectAnswer();
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'category' => $this->getCategory(),
            'question' => $this->getQuestion(),
            'answers' => $this->getAnswers(),
            'correct_answer' => $this->getCorrectAnswer(),
            'submitted_answer' => $this->submittedAnswer
        ];
    }


    public function offsetExists(mixed $offset): bool
    {
        $functionName = 'get' . ucfirst(Str::camel($offset));
        return property_exists($this, $offset) || method_exists($this, $functionName);
    }

    public function offsetGet(mixed $offset): mixed
    {
        $functionName = 'get' . ucfirst(Str::camel($offset));
        if(method_exists($this, $functionName)) {
            return $this->$functionName();
        }
        return $this->$offset ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset(mixed $offset): void
    {
        // TODO: Implement offsetUnset() method.
    }
}
