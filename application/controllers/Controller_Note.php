<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller_Admin
 *
 * @author Vitarr
 */
class Controller_Note extends Controller
{

    /**
     * Controller_Note constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Note;
    }

    public function action_view()
    {
        $extra_view = 'comments_view.php';
        $data = $this->model->get_note($_REQUEST['id']);
        $data_slider = $this->model->get_data_slider();
        if (!$data) {
            Route::ErrorPage404();
        } else if (!$data['notes'][0]['comment_id']) {
            $extra_view = 'nocomments_view.php';
        }
        $this->view->generate('note_view.php', 'template_view.php', $extra_view, $data, $data_slider);
    }

    public function action_add_comment()
    {
        $this->model->add_comment(strip_tags(filter_input(INPUT_POST, 'text')),
            strip_tags(filter_input(INPUT_POST, 'username')),
            strip_tags(filter_input(INPUT_POST, 'note_id')));
        header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/note/view/id/' . $_REQUEST['id']);
    }

    public function action_add_comment_ajax()
    {
        $this->model->add_comment(strip_tags(filter_input(INPUT_POST, 'text')),
            strip_tags(filter_input(INPUT_POST, 'username')),
            strip_tags(filter_input(INPUT_POST, 'note_id')));
        header('Content-Type: application/json;');
        echo $this->model->get_note_json($_REQUEST['id']);

    }

}
