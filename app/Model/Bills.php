<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $fillable = ['content','bills'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
