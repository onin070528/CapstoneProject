<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
            'password'          => 'hashed',
        ];
    }

    // ─────────────────────────────────────────
    // RBAC Helper Methods
    // ─────────────────────────────────────────

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if the user is a PTO Admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'pto_admin';
    }

    /**
     * Check if the user is an Establishment Owner.
     */
    public function isEstablishment(): bool
    {
        return $this->role === 'establishment_owner';
    }

    /**
     * Check if the user is a Public Tourist.
     */
    public function isTourist(): bool
    {
        return $this->role === 'public_tourist';
    }

    /**
     * Return the dashboard redirect path for this user's role.
     */
    public function dashboardRoute(): string
    {
        return match ($this->role) {
            'pto_admin'            => '/admin/dashboard',
            'establishment_owner'  => '/establishment/dashboard',
            default                => '/public',
        };
    }
}
