<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // il nome della function è il nome del model in relazione
    public function type(){
        // appartiene a Type
        return $this->belongsTo(Type::class);
    }

    protected $fillable = ['title', 'description'];
}
