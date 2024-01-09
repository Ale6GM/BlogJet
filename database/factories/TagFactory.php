<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Definimos la variable name que nos va a servir para luego genererar el slug
        $name = $this->faker->unique()->word(20); // en este caso a word dentro de los parentesis se le pone la cantidad de caracteres y (unique) garantiza que no se repitan 
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'color' => $this->faker->randomElement(['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink'])
        ];
    }
}
