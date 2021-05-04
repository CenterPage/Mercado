<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoServicioRequest extends FormRequest
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
            'fecha' => ['date', 'required'],
            'fecha_deuda' => ['nullable'],
            'num_operacion' => ['nullable', 'max:250'],
            'monto_deposito' => ['nullable'],
            'fecha_deposito' => ['nullable'],
            'num_recibo' => ['max:250', 'required', 'unique:pagos'],
            'monto_remodelacion' => ['nullable'],
            'monto_constancia' => ['nullable'],
            'monto_agua' => ['required'],
            'monto_agua_anticipada' => ['nullable'],
            'monto_sisa' => ['nullable'],
            'monto_sisa_anticipada' => ['nullable'],
            'puesto_id' => ['nullable'],
            'tipo_id' => ['nullable'],
        ];
    }
}
