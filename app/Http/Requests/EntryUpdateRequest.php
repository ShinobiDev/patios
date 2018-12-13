<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EntryUpdateRequest extends FormRequest
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
      // dd($this->entry->id);
        $rules =[
          'placa'       =>  'required|max:6|min:6|string',[ Rule::unique('entries')->ignore($this->entry->id)],
          'direccion'   =>  'required|max:8|min:25',
          'tipo'        =>  'required|string',
          'causal'      =>  'required',
          'servicio'    =>  'required|string',
          'color'       =>  'required|max:4|min:20',
          'marca'       =>  'required|max:4|min:20',
          'rate_id'     =>  'required',
          'crane_id'    =>  'required',
          'recibe'      =>  'required',

        ];

        if ($this->filled('comparendo')) {

             $rules['comparendo'] = ['numeric','digits:20'];
        }

        if ($this->filled('grado')) {

             $rules['grado'] = ['string'];
        }

        if ($this->filled('motor')) {

             $rules['motor'] = ['string'];
        }

        if ($this->filled('infraccion_id')) {

             $rules['infraccion_id'] = ['string'];
        }

        if ($this->filled('grua')) {

             $rules['grua'] = ['max:6|min:6|string'];
        }

        if ($this->filled('chasis')) {

             $rules['chasis'] = ['string'];
        }

        if ($this->filled('fisico')) {

             $rules['fisico'] = ['string'];
        }



        return $rules;
    }
}
