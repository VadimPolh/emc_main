<?php namespace App\Http\Controllers;


use App\Commands\ChangeLocaleCommand;

class HomeController extends Controller {

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
    if (\Auth::check()){
      
      $user = \Auth::user();
      
      return view('front.inspinia.index',compact('user'));
    
    }else{
      return view('front.inspinia.auth.login');
    }
		
	}

	/**
	 * Change language.
	 *
	 * @param  Illuminate\Session\SessionManager  $session
	 * @return Response
	 */
	public function language(
		ChangeLocaleCommand $changeLocaleCommand)
	{
		$this->dispatch($changeLocaleCommand);

		return redirect()->back();
	}

}
