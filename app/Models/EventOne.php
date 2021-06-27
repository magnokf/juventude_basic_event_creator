<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class EventOne extends Model
{
    use HasUuid;
    use Notifiable, HasFactory;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'ip_address',
        'email_verified_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtoupper($value);
    }
    public function getEmailVerifiedAtAttribute($value)
    {
        if (empty(  $this->attributes['email_verified_at']) ){
            return null;
        }
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }



}
