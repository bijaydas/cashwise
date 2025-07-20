<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
        'avatar',
        'account_status',
        'date_format',
        'time_format',
        'date_of_birth',
        'date_of_anniversary',
        'date_joined',
        'gender',
        'primary_phone',
        'secondary_phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function loginSession(): HasMany
    {
        return $this->hasMany(LoginSession::class);
    }

    public function createLoginSession(string $sessionId)
    {
        return $this->loginSession()->create([
            'session_id' => $sessionId,
            'login_at' => now(),
        ]);
    }

    public function logoutSession(string $sessionId): int
    {
        return $this->loginSession()->where('session_id', $sessionId)
            ->update([
                'logout_at' => now(),
            ]);
    }

    public function isOnline(): bool
    {
        return $this->loginSession()->where('logout_at', null)->exists();
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function createTransaction(array $data): Model
    {
        return $this->transactions()->create($data);
    }

    public function getUserName(): string
    {
        if (! $this->name) {
            return $this->email;
        }

        return $this->name;
    }
}
