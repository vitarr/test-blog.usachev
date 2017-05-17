<?php

/**
 * get data for slider
 *
 * @author Victor
 */
trait Slider_query
{
    /**
     * get all info from table notes and count of comments
     * @return mixed
     */
    public function get_data_slider()
    {
        $query_notes = "SELECT *, (SELECT COUNT(comments.note_id) FROM comments WHERE notes.id=comments.note_id) as 'comments_count' FROM notes ORDER BY `comments_count` DESC LIMIT 5;";
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
            $data['top_notes'] = $notes;
            return $data;
        }
    }
}