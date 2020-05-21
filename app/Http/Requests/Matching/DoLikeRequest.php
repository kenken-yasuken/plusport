<?php

namespace App\Http\Requests\Matching;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DoLikeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }
    /**
     * same as getPartnerID function
     * @return string
     */
    public function getToUserID(){
        return $this->input(self::TO_USER_ID);
    }
    const TO_USER_ID = 'to_user_id';
}