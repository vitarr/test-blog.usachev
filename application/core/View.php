<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Base class view
 *
 * @author Victor
 */
class View {

    /**
     * @var string name of main template file
     */
    protected $template_view = "template_view.php"; // здесь можно указать общий вид по умолчанию.

    /**
     * render page
     * @param $content_view
     * @param null $template_view
     * @param null $extra_view
     * @param null $data
     * @param null $extra_data
     */
    function generate($content_view, $template_view = null, $extra_view = null, $data = null, $extra_data = null) {
	if (!is_null($template_view)) {
	    $this->template_view = $template_view;
	}
	include_once '../application/views/templates/' . $this->template_view;
    }

}
