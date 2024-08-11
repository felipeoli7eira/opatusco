<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Consulta extends Model
{
    protected $fillable = [
        'data',
        'periodo',
        'sintomas',
        'medico_id',
        'cliente_id',
        'pet_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
