<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name', 'description', 'github_link', 'type_id'];

    //il nostro modello Project appartiene ad un solo Tipo
    public function type() {
        return $this->belongsTo(Type::class);
    }

    //il nostro modello Project appartiene a più Tecnologie
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
