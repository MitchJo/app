<?php

class ContactsController extends BaseController {

	protected $layout="layouts.master";
	
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getView()
	{
		$title='Contact Us';
		View::share('title',$title);
		$this->layout->content=View::make('contacts');
	}


	public function postSendmsg()
	{

        //Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array (
            //'first_name' => 'required', uncomment if you want to grab this field
            'email_id' 	  => 'required|email',  //uncomment if you want to grab this field
            'subject'	  =>'required|min:2',
            'enquiry_msg' => 'required|min:5'
        );

        //Validate data
        $validator = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes())
        {

           Mail::send('auth.feedback', $data, function($message) use ($data)
            {
                //$message->from($data['email'] , $data['first_name']); uncomment if using first name and email fields 
                //$message->
    			//email 'To' field: cahnge this to emails that you want to be notified.                    
    			$message->from(Input::get('email_id'))
    						->to('mitchjo74@gmail.com')
    							->subject(Input::get('subject'));

            });
            // Redirect to page
			   return Redirect::to('contacts/view')
			    ->with('message', 'Your message has been sent. Thank You!');


            //return View::make('contact');  
		}
		else
		{
			   //return contact form with errors
			return Redirect::to('contacts/view')
			      ->with('error', 'The following errors occured')
			         ->withErrors($validator)
			           ->withInput();

         }
     }

}