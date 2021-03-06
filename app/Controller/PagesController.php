<?php
/* SVN FILE: $Id: pages_controller.php 4786 2007-04-05 17:57:00Z phpnut $ */

/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.controller
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 4786 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-04-05 12:57:00 -0500 (Thu, 05 Apr 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Short description for class.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		cake
 * @subpackage	cake.cake.libs.controller
 */
class PagesController extends AppController{

/**
 * Enter description here...
 *
 * @var unknown_type
 */
	 var $name = 'Pages';

/**
 * Enter description here...
 *
 * @var unknown_type
 */
	 var $helpers = array('Html');

/**
 * This controller does not use a model
 *
 * @var $uses
 */
	 var $uses = array();



	var $components = array('General');




/**
 * Displays a view
 *
 */
	 function display() {
		  if (!func_num_args()) {
				$this->redirect('/');
		  }



		  $path=func_get_args();
//debug(func_get_args());

		  if (!count($path)) {
				$this->redirect('/');
		  }

		  $count  =count($path);
		  $page   =null;
		  $subpage=null;
		  $title  =null;

		  if (!empty($path[0])) {
				$page = $path[0];
		  }

		  if (!empty($path[1])) {
				$subpage = $path[1];
		  }

		  if (!empty($path[$count - 1])) {
				$title = ucfirst($path[$count - 1]);
		  }

		  $this->set('page', $page);
		  $this->set('subpage', $subpage);
		  $this->set('title', $title);

			$this->autoRender = false;

		  $this->render(join('/', $path));
	 }

	function index() {
		$folder = func_get_args();
		$this->display($folder[0],'index');
	}


	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}



}
?>