<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingBlocking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_to_block',
        'from',
        'to',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'from' => 'date',
        'to' => 'date',
    ];

    public function getTypeToBlockDisplayAttribute()
    {
        switch ($this->type_to_block) {
            case 'activity,booking':
                return 'Activité & Programmation';
            case 'activity':
                return 'Activité';
            case 'booking':
                return 'Programmation';
            default:
                return null;
        }
    }
}
