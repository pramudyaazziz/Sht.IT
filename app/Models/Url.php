<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Carbon\Carbon;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'original_url',
        'title',
        'user_id',
    ];
    public function stats (): Relation
    {
        return $this->hasMany(Stats::class);
    }
    public function user (): Relation
    {
        return $this->belongsTo(User::class);
    }
    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

}
