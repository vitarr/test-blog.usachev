<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 * base class of models
 *
 * @author web
 */
abstract class Model {

    /**
     * get data to view
     * @return mixed
     */
    abstract protected function get_data();

}
