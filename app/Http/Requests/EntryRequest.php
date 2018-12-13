<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
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
        $rules =[
          'placa'       =>  'required|max:6|min:5|string',[ Rule::unique('entries')->ignore($this->entry->id)],
          // 'placa'            =>  'required|max:6|min:6|string',
          'direccion'        =>  'required',
          'tipo'             =>  'required',
          'causal'           =>  'required',
          'servicio'         =>  'required',
          'color'            =>  'required',
          'marca'            =>  'required',
          'rate_id'          =>  'required',
          'crane_id'         =>  'required',
          'recibe'           =>  'required',
        ];

        if ($this->filled('comparendo')) {

             $rules['comparendo'] = ['numeric','digits:20'];
        }
        if ($this->filled('infraccion_id')) {

             $rules['infraccion_id'] = ['numeric'];
        }

        if ($this->filled('grado')) {

             $rules['grado'] = ['string'];
        }

        if ($this->filled('motor')) {

             $rules['motor'] = ['string'];
        }

        if ($this->filled('chasis')) {

             $rules['chasis'] = ['string'];
        }

        if ($this->filled('fisico')) {

             $rules['fisico'] = ['string'];
        }

          if ($this->filled('grua')) {

               $rules['grua'] = ['string'];
        }

        return $rules;
    }
}
