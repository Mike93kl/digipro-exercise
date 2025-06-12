<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $table = 'answers';

    protected $guarded = ['id'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(SearchHistory::class, 'search_id', 'id');
    }


}
