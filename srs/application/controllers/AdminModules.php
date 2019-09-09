<?php
#
# Copyright (c) 2019 by:
# ITCrats Info Solutions
# @author JANI SHAIK
# @created 21/08/2019
#

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModules extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$this->load->view('header');
		//$this->load->view('dashboard');
		$this->load->view('footer');
	}

	/**
	* Dashboard
	*
	*/
	public function dashboard() {
		$this->load->view('header');
		//$this->load->view('dashboard');
		$this->load->view('footer');
	}

}
