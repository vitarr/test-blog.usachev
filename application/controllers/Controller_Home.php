<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controller of home page
 *
 * @author Victor
 */
class Controller_Home extends Controller
{

    /**
     * Controller_Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Home();
    }

    /**
     * render main page
     *
     */
    public function action_view()
    {
        $data = $this->model->get_data();
        $data_slider = $this->model->get_data_slider();
        $this->view->generate('home_view.php', null, $extra_view = null, $data, $data_slider);
    }

    /**
     *
     * add new note
     *
     */
    public function action_add_note()
    {
        $this->model->add_note(strip_tags(filter_input(INPUT_POST, 'username')), strip_tags(filter_input(INPUT_POST, 'text')));
        header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/home');

    }

    /**
     *
     * add new note with ajax
     * @return string json
     *
     */
    public function action_add_note_ajax()
    {
        $this->model->add_note(strip_tags(filter_input(INPUT_POST, 'username')), strip_tags(filter_input(INPUT_POST, 'text')));
        header('Content-Type: application/json;');
        echo $this->model->get_data_json();
    }
}
