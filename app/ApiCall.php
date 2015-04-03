<?php namespace ScholarCheck;

use Illuminate\Database\Eloquent\Model;

class ApiCall extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'api_calls';

    public function key()
    {
        return $this->belongsTo('\ScholarCheck\ApiKey', 'api_key_id');
    }
}
