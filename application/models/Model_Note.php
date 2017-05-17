<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model of note page
 *
 * @author Victor
 */
class Model_Note extends Model
{

    use Db_connection;
    use Slider_query;

    /**
     * Model_Note constructor.
     * connect to DB
     */
    public function __construct()
    {
        $this-$this->db_connect();
    }

    protected function get_data()
    {
        // TODO: Implement get_data() method.
    }

    /**
     * @param $id int id of current page
     * @return mixed data about page and it comments
     */
    public function get_note($id)
    {
        $query_data = "SELECT notes.id AS 'note_id', notes.username as 'note_username',
 (SELECT COUNT(comments.id) FROM comments INNER JOIN notes on comments.note_id=notes.id WHERE notes.id=$id) as 'comments_count',
  notes.text AS 'note_text', notes.date as 'note_date', comments.id AS 'comment_id', comments.username as 'comment_username',
   comments.text AS 'comment_text', comments.date as 'comment_date' FROM `notes` LEFT OUTER JOIN comments ON comments.note_id=notes.id  WHERE notes.id=$id;";
        $result_data = $this->db->query($query_data);
        if ($result_data) {
            $notes = array();
            while ($row = $result_data->fetch_assoc()) {
                $notes[] = $row;
            }
            $data['notes'] = $notes;
            return $data;
        }
    }

    /**
     * @param $id int id of current note
     * @return string json data about page and it comments for ajax
     */
    public function get_note_json($id)
    {
        $query_data = "SELECT notes.id AS 'note_id', notes.username as 'note_username',
 (SELECT COUNT(comments.id) FROM comments INNER JOIN notes on comments.note_id=notes.id WHERE notes.id=$id) as 'comments_count',
  notes.text AS 'note_text', notes.date as 'note_date', comments.id AS 'comment_id', comments.username as 'comment_username',
   comments.text AS 'comment_text', comments.date as 'comment_date' FROM `notes` LEFT OUTER JOIN comments ON comments.note_id=notes.id  WHERE notes.id=$id;";
        $result_data = $this->db->query($query_data);
        if ($result_data) {
            while ($row = $result_data->fetch_assoc()) {
                $data[] = $row;
            }
            return json_encode($data);
        }
    }

    /**
     * create new comment
     * @param $text text of comment
     * @param $username username of user who make comment
     * @param $note_id id of current note
     */
    public function add_comment($text, $username, $note_id)
    {
        $date = date("Y-m-d H:i:s");
        $query_add = "INSERT INTO `comments` (`id`, `text`, `username`, `date`, `note_id`) VALUES (NULL,'$text','$username','$date','$note_id');";
        $this->db->query($query_add);
    }

}
