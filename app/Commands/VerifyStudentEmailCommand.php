<?php namespace ScholarCheck\Commands;

use ScholarCheck\Commands\Command;

class VerifyStudentEmailCommand extends Command {

    public $email;

    /**
     * Create a new command instance.
     *
     * @param $email
     */
	public function __construct($email)
	{
		$this->email = $email;
	}

}
