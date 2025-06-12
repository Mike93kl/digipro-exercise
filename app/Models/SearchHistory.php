<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SearchHistory extends Model
{
    protected $table = 'search_history';

    protected $guarded = ['id'];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'search_id', 'id');
    }
}
