<?php namespace ScholarCheck\Http\Controllers;

use ScholarCheck\ApiKey;
use ScholarCheck\Http\Requests\ToggleApiKeyStatusRequest;

class ApiKeysController extends Controller {

    public function index()
    {
        $userKeys = \Auth::user()->apiKeys;

        return view('keys.index')
            ->with([
                'title' => 'API Keys',
                'keys' => $userKeys
            ]);
    }

    public function store()
    {
        $apiKey = new ApiKey;
        $apiKey->user_id = \Auth::user()->id;
        $apiKey->active = 1;
        $apiKey->generateUniqueKey();
        $apiKey->save();

        return response()->json([
            'key' => $apiKey->key,
            'buttonHtml' => $apiKey->present()->statusButton()
        ]);
    }

    public function toggle(ToggleApiKeyStatusRequest $request)
    {
        $key = ApiKey::find($request->input('apiKeyId'));

        if($key->active)
        {
            $key->active = 0;
        } else {
            $key->active = 1;
        }

        $key->save();

        return response()->json([
            'status' => (boolean) $key->active,
            'buttonHtml' => $key->present()->statusButton()
        ]);
    }

}
