<?php namespace App\Repositories;

use App\Models\User, App\Models\Role, App\Models\Groups;
use File, Auth;

class UserRepository extends BaseRepository{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Role
	 */	
	protected $role;

	/**
	 * Create a new UserRepository instance.
	 *
   	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct(
		User $user, 
		Role $role,
		Groups $groups)
	{
		$this->model = $user;
		$this->role = $role;
		$this->groups = $groups;
	}

	/**
	 * Save the User.
	 *
	 * @param  App\Models\User $user
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($user, $inputs)
	{		
		if(isset($inputs['seen'])) 
		{
			$user->seen = $inputs['seen'] == 'true';		
		} else {




			if(isset($inputs['username'])) {
				$user->username = $inputs['username'];
			}

			$user->email = $inputs['email'];

			if(isset($inputs['group_id'])) {
				$user->groups_id = $inputs['group_id'];	
			}
			elseif(isset($inputs['dogid'])){
				$user->groups_id = 1;
			}
			else {
        		$user->groups_id = 2;
      		}

			if(isset($inputs['role'])) {
				$user->role_id = $inputs['role'];	
			} else {
				$role_user = $this->role->where('slug', 'user')->first();
				$user->role_id = $role_user->id;
			}
		}

		$user->save();
	}

	/**
	 * Get users collection.
	 *
	 * @param  int  $n
	 * @param  string  $role
	 * @return Illuminate\Support\Collection
	 */
	public function index($n, $role)
	{
		if($role != 'total')
		{
			return $this->model
			->with('role')
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})		
			->oldest('seen')
			->latest()
			->paginate($n);			
		}

		return $this->model
		->with('role')		
		->oldest('seen')
		->latest()
		->paginate($n);
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function count($role = null)
	{
		if($role)
		{
			return $this->model
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})->count();			
		}

		return $this->model->count();
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function counts()
	{
		$counts = [
			'admin' => $this->count('admin'),
			'redac' => $this->count('redac'),
			'user' => $this->count('user')
		];

		$counts['total'] = array_sum($counts);

		return $counts;
	}

	/**
	 * Get a user collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function create()
	{
		$select = $this->role->all()->lists('title', 'id');
		$group = $this->groups->all()->lists('name','id');
		$statut = $this->getStatut();

		return compact('select', 'statut','group');
	}

	/**
	 * Create a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $user_id
	 * @return App\Models\User 
	 */
	public function store($inputs)
	{
		$user = new $this->model;

		$user->password = bcrypt($inputs['password']);

		$this->save($user, $inputs);

		return $user;
	}

	/**
	 * Get user collection.
	 *
	 * @param  string  $slug
	 * @return Illuminate\Support\Collection
	 */
	public function show($id)
	{
		$user = $this->model->with('role')->findOrFail($id);

		$statut = $this->getStatut();

		return compact('user' ,'statut');
	}

	/**
	 * Get user collection.
	 *
	 * @param  int  $id
	 * @return Illuminate\Support\Collection
	 */
	public function edit($id)
	{
		$user = $this->getById($id);

		$select = $this->role->all()->lists('title', 'id');

		return compact('user', 'select');
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $id
	 * @return void
	 */
	public function update($inputs, $id)
	{
		$user = $this->getById($id);

		$this->save($user, $inputs);
	}

	/**
	 * Get statut of authenticated user.
	 *
	 * @return string
	 */
	public function getStatut()
	{
		return session('statut');
	}

	/**
	 * Create and return directory name for redactor.
	 *
	 * @return string
	 */
	public function getName()
	{
		$name = strtolower(strtr(utf8_decode(Auth::user()->username), 
			utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 
			'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'
		));

		$directory = base_path() . config('medias.url-files') . $name;

		if (!File::isDirectory($directory))
		{
			File::makeDirectory($directory); 
		}  

		return $name;  
	}

	/**
	 * Valid user.
	 *
     * @param  bool  $valid
     * @param  int   $id
	 * @return void
	 */
	public function valide($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

	/**
	 * Destroy a user.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function destroy($id)
	{
		$user = $this->getById($id);

		$user->comments()->delete();
		
		$user->delete();
	}

}