<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    #fillable
    protected $fillable = [
        'in',
        'out',
        'total',
        'visitor_id',
        'component_id',
    ];

    #relationships
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    #scopes
    public function scopeSearch($query, $val)
    {
        return $query
            ->where('in', 'like', '%' . $val . '%')
            ->orWhere('out', 'like', '%' . $val . '%')
            ->orWhere('total', 'like', '%' . $val . '%')
            ->orWhere('visitor_id', 'like', '%' . $val . '%')
            ->orWhere('component_id', 'like', '%' . $val . '%');
    }
}
