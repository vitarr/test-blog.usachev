<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model of home page
 *
 * @author Victor
 */
class Model_Home extends Model
{

    use Db_connection;
    use Slider_query;

    /**
     * Model_Home constructor.
     */
    public function __construct()
    {
        $this->db_connect();
    }

    /**
     * get all data about notes including count of comments
     * @return mixed
     */
    public function get_data()
    {
        $query_notes = "SELECT *, (SELECT COUNT(comments.note_id) FROM comments WHERE notes.id=comments.note_id) as 'comments_count' FROM notes ORDER BY `notes`.`date` DESC;";
        $result_notes = $this->db->query($query_notes);
        if ($result_notes) {
            $notes = array();
            while ($note = $result_notes->fetch_assoc()) {
                $note['text'] = substr($note['text'], 0, 100);
                $note['text'] = rtrim($note['text'], "!,.-");
                $note['text'] = substr($note['text'], 0, strrpos($note['text'], ' '));
                $note['text'] .= "&#8230;";
                $notes[] = $note;
            }
            $data['notes'] = $notes;
            return $data;
        }
    }

    /**
     * get all data about notes including count of comments
     * @return string json for ajax
     */
    public function get_data_json()
    {
        $query_notes = "SELECT *, (SELECT COUNT(comments.note_id) FROM comments WHERE notes.id=comments.note_id) as 'comments_count' FROM notes ORDER BY `notes`.`date` DESC;";
        $result_notes = $this->db->query($query_notes);
        if ($result_notes) {
            while ($note = $result_notes->fetch_assoc()) {
                $data[] = $note;
            }
            return json_encode($data);
        }
    }

    /**
     * add new note
     * @param $username
     * @param $text
     */
    public function add_note($username, $text)
    {
        $date = date("Y-m-d H:i:s");
        $query_add = "INSERT INTO `notes` (`id`, `username`, `text`, `date`) VALUES (NULL, '$username', '$text', '$date');";
        $this->db->query($query_add);
    }
}
