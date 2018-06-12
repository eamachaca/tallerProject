<?php

namespace App\Http\Requests;

use App\Zone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ZoneRequest extends FormRequest
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
    public function rules(Request $request,Zone $zone)
    {
        return [
            'color' => 'required',
            'name' => 'required|max:50|unique:zones,id,'.$zone->id,
            'geo_json'=>'required'
        ];
    }
}
