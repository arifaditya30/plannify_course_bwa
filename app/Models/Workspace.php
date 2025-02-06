<?php

namespace App\Models;

use App\Enums\WorkspaceVisibility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Workspace extends Model
{


    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'cover',
        'logo',
        'visibility',
    ];

    //function casts berfungsi untuk mengubah tipe data dari database ke tipe data yang diinginkan
    protected function casts(): array
    {
        return [
            'visibility' => WorkspaceVisibility::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function member(): MorphMany
    {
        return $this->morphMany(Member::class, 'memberable');
    }
}
