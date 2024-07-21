<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['roleID', 'role'];

    public $timestamps = false;

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
