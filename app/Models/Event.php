<?php

namespace App\Models;

use App\Concerns\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use ClearsResponseCache;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'title',
        'location',
        'google_map',
        'note',
        'cncf_url',
        'start_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'datetime',
    ];

    public function isHappeningOrInFuture()
    {
        return $this->start_date->isToday() || $this->start_date->isFuture();
    }

    public function isPast()
    {
        return $this->start_date->isYesterday() || $this->start_date->isBefore(now()->yesterday());
    }
}
