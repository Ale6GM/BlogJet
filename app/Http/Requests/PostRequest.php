<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Esta regla evitaba que un post pueda ser asignado a un usuario diferente del que lo creo
        /* if($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        } */

        /* Esta condicio compara si el id del usuario que se envia desde la vista mediante un input
        oculto coincide con la informacion del usuario autenticado, si coincide se le eautoriza y pasa a la validacion pero sino entonces no se le autoriza a continuar
        */

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if($post) {
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        if($this->status == 2) {
            $rules = array_merge($rules, [ // array_merge es un metodo de php que permite fusionar dos arrays, y recibe a los dos como parametros
                'extract' => 'required',
                'body' => 'required',
                'category_id' => 'required',
                'tags' => 'required',


            ]);

        }

        return $rules;
    }
}
