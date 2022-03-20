<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Reception extends Model
{
    use HasFactory;

    public $table = 'reception';

    protected $fillable = [
        'object_id',
        'card_id',
    ];
}
