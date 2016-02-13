<?php

class UsersController extends \BaseController {
		protected $layout="layouts.master";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		$validator=Validator::make(Input::all(),User::$rules);
		$confirmation_code=str_random(30);

		if($validator->passes()){
			//validation passes saves user in database
			$user=new User;
			$user->firstname=Input::get('firstname');
			$user->lastname=Input::get('lastname');
			$user->email_id=Input::get('email_id');
			$user->password=Hash::make(Input::get('password'));
			$user->confirmation_code=$confirmation_code;
			$user->save();

			$data=array(
					'firstname'=>Input::get('firstname'),
					'email_id'=>Input::get('email_id'),
					'confirmation_code'=>$confirmation_code,
				);
			
			Mail::send('auth.email',$data,function($message){
				$message->to(Input::get('email_id'),Input::get('firstname'))
							->subject('Verify your email address');
			});

			Return Redirect::to('users/login')->with('message','Thanks for registering!');
		}
		else{
			//validation fails displays error messages
			Return Redirect::to('users/register')->with('message','The following errors occured')
					->withErrors($validator)
						->withInput();
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getRegister()
	{
		$title = 'Registration';
    	View::share('title', $title);
		$this->layout->content=View::make('auth.register');
	}

	public function getLogin(){
			$title = 'Welcome';
    		View::share('title', $title);
			$this->layout->content=View::make('auth.login');
	}

	public function postLogin()
	{
		if(Auth::attempt(array('email_id'=>Input::get('email_id'),'password'=>Input::get('password')))) {
				return Redirect::to('welcome');
			 }
		else {
			return Redirect::to('/users/login')->with('message','Your email/password is incorrect')
			 ->withInput();
		}

	}

	public function getLogout() {
    	Auth::logout();
    	return Redirect::to('welcome');
	}

	public function _construct()
	{
		$this->beforeFilter('csrf',array('on'=>'post'));
		
	}
}
