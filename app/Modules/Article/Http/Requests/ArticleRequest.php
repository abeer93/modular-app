<?php

namespace App\Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ArticleRequest responsible for validating article requests
 * @package App\Modules\Article\Http\Requests
 * @author Abeer Elhout<abeer.elhout@gmail.com>
 */
class ArticleRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'required|string|max:191',
            'content' => 'required',
            'image'   => 'mimes:jpeg,jpg,png,bmp,gif,svg,webp'
        ];
    }
}
