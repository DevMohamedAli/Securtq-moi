<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    #fillable
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;


    #scopes
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['name']) && $filters['name']) {
            $query->where('name', $filters['name']);
        }
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
