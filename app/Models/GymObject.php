<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;


class GymObject extends Model
{
    use Uuids;
    use HasFactory;

    public $table = 'objects';

    protected $fillable = [
        'name',
    ];
}
