<?php namespace ScholarCheck\Handlers\Commands;

use ScholarCheck\Commands\VerifyStudentEmailCommand;

use Illuminate\Queue\InteractsWithQueue;

class VerifyStudentEmailCommandHandler {

	/**
	 * Create the command handler.
	 *
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  VerifyStudentEmailCommand  $command
	 * @return void
	 */
	public function handle(VerifyStudentEmailCommand $command)
	{
		dd($command);
	}

}
