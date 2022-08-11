<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Store Book Request",
 *      description="Validacion de los Datos de Libros",
 *      type="object",
 *      required={"name", "price", "date_published"}
 * )
 */
class StoreBookRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Nombre del libro",
     *      example="Harry Potter"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="price",
     *      description="Precio del precio",
     *      example=12
     * )
     *
     * @var integer
     */
    public $price;

    /**
     * @OA\Property(
     *      title="date_published",
     *      description="Fecha de publicacion",
     *      example="2022-07-07"
     * )
     *
     * @var string
     */
    public $date_published;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'date_published' => 'required|date'
        ];
    }
}
