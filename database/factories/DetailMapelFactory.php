<?php

namespace Database\Factories;

use App\Models\DetailMapel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailMapel>
 */
class DetailMapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DetailMapel::class;

    public function definition()
    {
        return [
            'id_mapel' => \App\Models\Mapel::factory(),
            'id_santri' => \App\Models\Santri::factory(),
        ];
    }
}
