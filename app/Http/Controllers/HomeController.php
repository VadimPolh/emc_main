<?php namespace App\Http\Controllers;


use App\Commands\ChangeLocaleCommand;
use App\Repositories\SpecialtyRepository;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;

class HomeController extends Controller {

	
  	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_gestion;
  
  
  
  	/**
	 * The UserRepository instance.
	 *
	 * @var App\Repositories\UserRepository
	 */
	protected $user_gestion;
  
  
  
  /**
	 * The pagination number.
	 *
	 * @var int
	 */
	protected $nbrPages;
    
  /**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index(BlogRepository $blog_gestion,UserRepository $user_gestion,SpecialtyRepository $specialty_gestion)
	{
    if (\Auth::check()){
      
    $this->user_gestion = $user_gestion;
		$this->blog_gestion = $blog_gestion;
    $this->specialty_gestion = $specialty_gestion;
		$this->nbrPages = 50;

		$this->middleware('redac', ['except' => ['indexFront', 'show', 'tag', 'search']]);
		$this->middleware('ajax', ['only' => ['indexOrder', 'updateSeen', 'updateActive']]);
      
     
      
      $user = \Auth::user();
      $specialty = $this->specialty_gestion->all();
      
      
      
      //Новости
      $posts = $this->blog_gestion->indexFront($this->nbrPages);
    	$links = str_replace('/?', '?', $posts->render());
      
      return view('front.inspinia.index',compact('user','specialty','posts', 'links'));
      
    
    
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
