<div class="section group">
    <div class="col-md-10 col-md-offset-2 cont span_2_of_3" style="margin-bottom: 30px;">
        <button style="font-size: 14px" id="content" type="button" class="addnote" data-toggle="collapse"
                data-target="#note"><span
                    class="fa fa-plus"
                    style="color: white; font-size: 18px;"></span>
            Добавление новой записи
        </button>
        <div id="note" class="collapse">
            <div class="comments-area">
                <h3 style="text-align: left;">Добавить запись</h3>
                <form id="addnote" method="post" action="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/home/add_note' ?>"
                      role="form">
                    <p>
                        <label>Имя:</label>
                        <span>*</span>
                        <input id="note_username" type="text" name="username" required>
                    </p>
                    <p>
                        <label>Текст:</label>
                        <span>*</span>
                        <textarea id="note_text" name="text" required></textarea>
                    </p>
                    <p>
                        <input type="submit" name="addnote" value="Добавить">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="section group">
    <div id="content_notes" class="col-md-10 col-md-offset-1 cont span_2_of_3">
        <?php if (!empty($data['notes'])) : ?>
            <?php foreach ($data['notes'] as $row): ?>
                <div class="blog_grid">
                    <ul class="links">
                        <li><i class="date"> </i><span class="icon_text"><?= $row['date'] ?></span></li>
                        <li><i class="admin"> </i><span class="icon_text"><?= $row['username'] ?></span></li>
                        <li class="last"><i class="comments"></i><span
                                    class="icon_text">Комментариев - <?= $row['comments_count'] ?></span>
                        </li>
                    </ul>
                    <p><?= $row['text'] ?></p>
                    <div class="button1"><a class="more"
                                            href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/note/view/id/' . $row['id'] ?>">Вся
                            запись</a></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</div>
