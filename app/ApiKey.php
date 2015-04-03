<?php namespace ScholarCheck;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class ApiKey extends Model {

    use PresentableTrait;

    protected $presenter = '\ScholarCheck\Presenters\ApiKeyPresenter';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'api_keys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key'];

    public function user()
    {
        return $this->belongsTo('\ScholarCheck\User');
    }

    public function generateUniqueKey()
    {

        do {
            $randomKey = str_random(30);
        } while(ApiKey::where('key', '=', $randomKey)->count() > 0);

        $this->key = $randomKey;
        $this->save();
    }

    public function apiCalls()
    {
        return $this->hasMany('ScholarCheck\ApiCall');
    }

}
