<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca_id', 'modelo_id', 'cor_id', 'ano', 
        'quilometragem', 'valor', 'detalhes', 'foto_principal'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }

    public function fotos()
    {
        return $this->hasMany(VeiculoFoto::class);
    }
}
