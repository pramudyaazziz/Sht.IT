<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'soriginal_url',
        'title',
        'used_id',
    ];
    public function stats (): Relation
    {
        return $this->hasMany(Stats::class);
    }
    public function user (): Relation
    {
        return $this->belongsTo(User::class);
    }
}
