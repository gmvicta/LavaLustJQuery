<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Welcome extends Controller
{
	public function index()
	{
		// $this->call->view('welcome_page');
		
		header("Location: /users");
	}
}
