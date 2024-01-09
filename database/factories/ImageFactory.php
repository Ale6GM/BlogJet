<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /* Aqui con el metodo faker->image le pasamos como primer parametro la direccion de donde queremos guardar la foto, el segundo y tercer parametro 
            son las dimenciones de la imagen, el cuarto se deja null y el quinto asimila true o false en el caso de true guarda la imagen de la siguiente forma
            public/storage/posts/imagen.jpg, en el caso de false: solo imagen.jpg. 
            pero en este ejemplo luego de url pusimos 'posts/ y eso lo concatenamos con la sentencia faker para que la direccion de la imagen quedara asi, posts/imagen.jpg'*/
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)
        ];
    }
}
