<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_card_number',
        'id_card_type',
        'work_place',
        'picture',
        'armed',
        'gun_id',
        'nationality_id'
    ];



    public function gun()
    {
        return $this->belongsTo(Gun::class);
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    #scopes
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('id_card_number', 'like', '%' . $search . '%')
            ->orWhere('id_card_type', 'like', '%' . $search . '%')
            ->orWhere('work_place', 'like', '%' . $search . '%')
            ->orWhere('armed', 'like', '%' . $search . '%');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['gun_id']) && $filters['gun_id']) {
            $query->where('gun_id', $filters['gun_id']);
        }
        if (isset($filters['name']) && $filters['name']) {
            $query->where('name', $filters['name']);
        }
        if (isset($filters['id_card_number']) && $filters['id_card_number']) {
            $query->where('id_card_number', $filters['id_card_number']);
        }
        if (isset($filters['id_card_type']) && $filters['id_card_type']) {
            $query->where('id_card_type', $filters['id_card_type']);
        }
        if (isset($filters['work_place']) && $filters['work_place']) {
            $query->where('work_place', $filters['work_place']);
        }
        if (isset($filters['armed']) && $filters['armed']) {
            $query->where('armed', $filters['armed']);
        }
    }
}
