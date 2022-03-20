<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Card extends Model
{
    use Uuids;
    use HasFactory;

    public $table = 'cards';

    protected $fillable = [
        'user_id',
        'card_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
