<?php

namespace App\Model;
use App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = ['content'];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
