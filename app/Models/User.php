<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function cart() {
        $cartInstance = $this->hasOne(Cart::class);
        return $cartInstance;
    }

    // delete this method
    public function getCartProducts() {
        // $cartProducts = $this->hasManyThrough(Product::class, Cart::class);
        $userId = Auth::user()->id;
        $cartEntries = Cart::where('user_id',$userId)->get();

        foreach ($cartEntries as $cart) {
            $products = $cart->products()->get();
        };
        // return $cartProducts;
    }
}
