<?php

namespace App\Models;

<<<<<<< HEAD
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasFactory, Notifiable;

    /**
     * Mass assignable attributes
=======
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'id_google',   
        'otp',        
    ];

    /**
     * Hidden attributes
=======
        'id_role',
        'otp',
        'id_google'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
     * Casts
=======
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
<<<<<<< HEAD
}
=======

    public function Role() {
        return $this->hasOne(Role::class, 'id_role');
    }
}
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
