<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];
    protected $table = 'cores';

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
