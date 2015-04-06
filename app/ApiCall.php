<?php namespace ScholarCheck;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class ApiCall extends Model {

    use PresentableTrait;

    protected $presenter = '\ScholarCheck\Presenters\ApiCallPresenter';


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
