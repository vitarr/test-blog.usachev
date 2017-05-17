<div class="section group">
    <div class="col-md-12 cont span_2_of_3">
        <div class="blog_grid">
            <ul class="links">
                <li><i id="note_date" class="date"> </i><span
                            class="icon_text"><?= $data['notes'][0]['note_date'] ?></span></li>
                <li><i id="note_username" class="admin"> </i><span
                            class="icon_text"><?= $data['notes'][0]['note_username'] ?></span></li>

            </ul>
            <p id="note_text" style="font-size:14px"><?= $data['notes'][0]['note_text'] ?></p>
            <ul class="links" style="margin-top: 20px;">
                <li><i class="comments"> </i><span
                                class="icon_text"> Комментариев - <b
                                    id="comments_count"><?= $data['notes'][0]['comments_count'] ?></b></span>
                </li>
            </ul>
            <div id="content_comments" class="row">
                <?php include_once '../application/views/' . $extra_view; ?>
            </div>
            <div class="comments-area col-md-offset-2">
                <h3 style="text-align: left;">Оставить комментарий</h3>
                <form id="addcomment" name="note" method="post"
                      action="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/note/add_comment/id/' . $data['notes'][0]['note_id'] ?>"
                      role="form">
                    <input type="hidden" id="note_id" name="note_id" value="<?= $data['notes'][0]['note_id'] ?>">
                    <p>
                        <label>Имя:</label>
                        <span>*</span>
                        <input id="comment_username" type="text" name="username" required>
                    </p>
                    <p>
                        <label>Текст:</label>
                        <span>*</span>
                        <textarea id="comment_text" name="text" required></textarea>
                    </p>
                    <p>
                        <input type="submit" name="addcomment" value="Добавить">
                    </p>
                </form>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>
