<?php if (!empty($data['notes'])) : ?>
    <?php foreach ($data['notes'] as $row): ?>
        <ul class="comment-list col-md-8 col-md-offset-2" style="padding: 10px;">
            <li>
                <ul class="links" style="margin-top: 0; border-top: 0; padding-top: 0;">
                    <li><i class="date"> </i><span class="icon_text"><?= $row['comment_date'] ?></span></li>
                    <li><i class="admin"> </i><span class="icon_text"><?= $row['comment_username'] ?></span></li>
                </ul>
                <div class="desc" style="padding: 0;">
                    <p style="font-style: italic; padding: 0;"><?= $row['comment_text'] ?></p>
                </div>
                <div class="clear"></div>
            </li>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
