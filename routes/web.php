<?php

use App\Livewire\PlayQuiz;
use App\Livewire\ShowResultsPage;
use App\Livewire\UserInfoPage;
use Illuminate\Support\Facades\Route;

Route::get('/', UserInfoPage::class);

Route::get('play', PlayQuiz::class)->name('quiz.index');
Route::get('results/{searchKey}', ShowResultsPage::class)->name('quiz.show');
