<?php namespace ScholarCheck\Presenters;

use Laracasts\Presenter\Presenter;

class ApiCallPresenter extends Presenter
{
    public function status()
    {
        $style = ($this->valid_email) ? "btn-success" : "btn-danger";
        $text = ($this->valid_email) ? "<i class=\"fa fa-check\"></i> Valid" : "<i class=\"fa fa-times-circle\"></i> Invalid";

        return '<button type="button" class="btn ' . $style . ' btn-xs">' . $text .'</button>';
    }
}