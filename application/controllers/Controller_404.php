<?php

/**
 * controller of 404 error page
 *
 * @author Victor
 *
 */
class Controller_404 extends Controller
{
    /**
     * Controller_404 constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * render default action
     */
    public function action_view()
    {
        $this->view->generate('404_view.php', 'template_404_view.php');
    }
}