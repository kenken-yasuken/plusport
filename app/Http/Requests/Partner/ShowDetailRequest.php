<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ShowDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
        {
        return Auth::check();
        }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    // public function getStoreNameID(): string
    // {
    //     return $this->input(self::STORE_NAME_ID);
    // }

    /**
     * Endpoint key can be null when user don't input characters.
     * Auto creation works in that case.
     */
    // public function getEndPointKey()
    // {
    // return $this->input(self::ENDPOINT_KEY);
    // }

    // const TABLE_NAME = 'scim_settings_tbl';
}