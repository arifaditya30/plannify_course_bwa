<?php

namespace App\Models;

use App\Enums\WorkspaceVisibility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
