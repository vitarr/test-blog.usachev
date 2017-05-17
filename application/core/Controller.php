<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Base class of controllers
 *
 * @author Victor
 */
abstract class Controller {
    /**
     * model
     * @var Model 
     */
    protected $model;

    /**
     * view
     * @var View 
     */
    protected $view;

    /**
     * Controller constructor.
     */
    function __construct() {
	$this->view = new View();
    }

    /**
     * deafult action
     * @return mixed
     */
    abstract  function action_view();
}
