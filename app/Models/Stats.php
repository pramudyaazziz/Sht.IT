<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Stats extends Model
{
    use HasFactory;
    protected $fillable = [
        'clicks',
        'url_id',
        'date',
    ];
    public function url (): Relation
    {
        return $this->belongsTo(Url::class);
    }
}
