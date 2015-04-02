<?php namespace ScholarCheck\Presenters;

use Laracasts\Presenter\Presenter;

class ApiKeyPresenter extends Presenter
{
    public function statusButton()
    {
        $style = ($this->active) ? "btn-success" : "btn-danger";
        $text = ($this->active) ? "Active" : "Inactive";

        return '<button data-key-id="' . $this->id . '" type="button" class="toggle-api-key-status btn ' . $style . '">' . $text .'</button>';
    }
}