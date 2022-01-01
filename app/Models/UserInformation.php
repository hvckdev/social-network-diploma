<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'city', 'country', 'website', 'show_middle_name', 'show_city',
        'show_country', 'show_email', 'show_website', 'visited_at',
    ];
}
