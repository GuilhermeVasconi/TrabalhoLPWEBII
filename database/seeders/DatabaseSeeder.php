<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);

        $fiat = \App\Models\Marca::create(['nome' => 'Fiat']);
        $volkswagen = \App\Models\Marca::create(['nome' => 'Volkswagen']);
        $chevrolet = \App\Models\Marca::create(['nome' => 'Chevrolet']);
        $toyota = \App\Models\Marca::create(['nome' => 'Toyota']);

        $uno = \App\Models\Modelo::create(['nome' => 'Uno', 'marca_id' => $fiat->id]);
        $palio = \App\Models\Modelo::create(['nome' => 'Palio', 'marca_id' => $fiat->id]);
        $gol = \App\Models\Modelo::create(['nome' => 'Gol', 'marca_id' => $volkswagen->id]);
        $polo = \App\Models\Modelo::create(['nome' => 'Polo', 'marca_id' => $volkswagen->id]);
        $onix = \App\Models\Modelo::create(['nome' => 'Onix', 'marca_id' => $chevrolet->id]);
        $corolla = \App\Models\Modelo::create(['nome' => 'Corolla', 'marca_id' => $toyota->id]);

        $branco = \App\Models\Cor::create(['nome' => 'Branco']);
        $preto = \App\Models\Cor::create(['nome' => 'Preto']);
        $prata = \App\Models\Cor::create(['nome' => 'Prata']);
        $vermelho = \App\Models\Cor::create(['nome' => 'Vermelho']);
        $azul = \App\Models\Cor::create(['nome' => 'Azul']);

        $veiculo1 = \App\Models\Veiculo::create([
            'marca_id' => $fiat->id,
            'modelo_id' => $uno->id,
            'cor_id' => $branco->id,
            'ano' => 2020,
            'quilometragem' => 35000,
            'valor' => 45000.00,
            'detalhes' => 'Veículo em excelente estado, único dono, todas as revisões feitas na concessionária.',
            'foto_principal' => 'https://s3.ecompletocarros.dev/images/lojas/375/veiculos/191755/veiculoInfoVeiculoImagesMobile/vehicle_image_1715184240_d41d8cd98f00b204e9800998ecf8427e.jpeg',
        ]);

        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo1->id,
            'url' => 'https://s3.ecompletocarros.dev/images/lojas/375/veiculos/191755/veiculoInfoVeiculoImagesMobile/vehicle_image_1715184240_d41d8cd98f00b204e9800998ecf8427e.jpeg',
        ]);
        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo1->id,
            'url' => 'https://mundodoautomovelparapcd.com.br/wp-content/uploads/2018/06/Fiat-uno-2019-Traseira.jpg',
        ]);
        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo1->id,
            'url' => 'https://quatrorodas.abril.com.br/wp-content/uploads/2020/07/Fiat-Uno-Drive-1-2.jpg?quality=70&strip=info',
        ]);

        $veiculo2 = \App\Models\Veiculo::create([
            'marca_id' => $volkswagen->id,
            'modelo_id' => $gol->id,
            'cor_id' => $prata->id,
            'ano' => 2019,
            'quilometragem' => 52000,
            'valor' => 42000.00,
            'detalhes' => 'Gol completo, ar condicionado, direção hidráulica, vidros elétricos.',
            'foto_principal' => 'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251112/VOLKSWAGEN-GOL-1.6-16V-MSI-TOTALFLEX-4P-AUTOMATICO-wmimagem14123761639.jpg',
        ]);

        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo2->id,
            'url' => 'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251112/VOLKSWAGEN-GOL-1.6-16V-MSI-TOTALFLEX-4P-AUTOMATICO-wmimagem14123761639.jpg',
        ]);
        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo2->id,
            'url' => 'https://carro.blog.br/wp-content/uploads/2019/02/volkswagen-gol-2019-traseira-800x500.jpg',
        ]);
        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo2->id,
            'url' => 'https://quatrorodas.abril.com.br/wp-content/uploads/2020/07/Fiat-Uno-Drive-1-2.jpg?quality=70&strip=info',
        ]);

        $veiculo3 = \App\Models\Veiculo::create([
            'marca_id' => $toyota->id,
            'modelo_id' => $corolla->id,
            'cor_id' => $preto->id,
            'ano' => 2022,
            'quilometragem' => 15000,
            'valor' => 125000.00,
            'detalhes' => 'Toyota Corolla 2022, automático, completo, garantia de fábrica.',
            'foto_principal' => 'https://img.olx.com.br/thumbs700x500/99/999541693201159.webp',
        ]);

        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo3->id,
            'url' => 'https://img.olx.com.br/thumbs700x500/99/999541693201159.webp',
        ]);
        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo3->id,
            'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSMw7dscVI2KR7DziDzNbF8seShtIX1JQC6g&s',
        ]);
        \App\Models\VeiculoFoto::create([
            'veiculo_id' => $veiculo3->id,
            'url' => 'https://s2-autoesporte.glbimg.com/RRzFSSDeZSY-YrZ-FPX7uU3QbDI=/0x0:2200x1400/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/p/7/KzaWXIRHS4BDAG11XIKw/corollaxeipainel.jpg',
        ]);
    }
}
