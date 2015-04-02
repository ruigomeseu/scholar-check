<?php namespace ScholarCheck\Http\Requests;

use ScholarCheck\ApiKey;
use ScholarCheck\Http\Requests\Request;

class ToggleApiKeyStatusRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $key = ApiKey::find(\Request::get('apiKeyId'));
        if ( ! $key || $key->user_id != \Auth::id()) {
            return false;
        }

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
            'apiKeyId' => 'required'
        ];
    }

}
