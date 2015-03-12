<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class ChangeLocaleCommand extends Command implements SelfHandling {

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		if (session('locale') == 'ru'){$new_lang = 'fr';}
    elseif(session('locale') == 'fr'){$new_lang = 'ru';}
    else{$new_lang = 'en';}
    
    session()->set('locale', 'ru');
  }
}
