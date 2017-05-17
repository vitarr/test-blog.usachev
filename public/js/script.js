$(document).ready(function () {
    $('#addnote').submit(function () {
        $.ajax({
            method: 'post',
            url: 'http://' + window.location.hostname + '/home/add_note_ajax',
            data: {
                username: $('#note_username').val(),
                text: $('#note_text').val()
            },
            success: function (data) {
                var res = '';
                $.each(data, function (index, value) {
                    res += '\n' +
                        '<div class="blog_grid">' +
                        '<ul class="links">' +
                        '<li><i class="date"> </i><span class="icon_text">' + value.date + '</span></li>' +
                        '<li><i class="admin"> </i><span class="icon_text">' + value.username + '</span></li>' +
                        '<li class="last"><a href="#"><i class="comments"></i><span class="icon_text">Комментариев - ' + value.comments_count + '</span></a>' +
                        '</li>' +
                        '<p>' + value.text + '</p>' +
                        '<div class="button1"><a class="more" href="http://' + window.location.hostname + '/note/view/id/' + value.id + '">Вся запись</a></div>' +
                        '</div>' +
                        '\n';
                });
                $('#content_notes').html(res);
                $('#note_text').val('');
                $('#note_username').val('');
                $('#content').click();
            }
        });
        return false;
    });
    $('#addcomment').submit(function () {
        $.ajax({
            method: 'post',
            url: 'http://' + window.location.hostname + '/note/add_comment_ajax/id/' + $('#note_id').val(),
            data: {
                text: $('#comment_text').val(),
                username: $('#comment_username').val(),
                note_id: $('#note_id').val()
            },
            success: function (data) {
                $('comments_count').val(data[0].comments_count);
                var res = '';
                $.each(data, function (index, value) {
                    res += '\n' +
                        '<ul class="comment-list col-md-8 col-md-offset-2" style="padding: 10px;">' +
                        '<li>' +
                        '<ul class="links" style="margin-top: 0; border-top: 0; padding-top: 0;">' +
                        '<li><i class="date"> </i><span class="icon_text">' + value.comment_date + '</span></li>' +
                        '<li><i class="admin"> </i><span class="icon_text">' + value.comment_username + '</span></li>' +
                        '</ul>' +
                        '<div class="desc" style="padding: 0;">' +
                        '<p style="font-style: italic; padding: 0;">' + value.comment_text + '</p>' +
                        '</div>' +
                        '<div class="clear"></div>' +
                        '</li>' +
                        '</ul>' +
                        '\n';
                });
                $('#content_comments').html(res);
                $('#comment_text').val('');
                $('#comment_username').val('');
            }
        });
        return false;
    });
});
$(document).ready(function () {
    $("#testimonial-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [767, 1],
        pagination: false,
        transitionStyle: "fade",
        navigation: true,
        navigationText: ["", ""],
        autoPlay: true
    });
});
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 100) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
});
addEventListener("load", function () {
    setTimeout(hideURLbar, 0);
}, false);
function hideURLbar() {
    window.scrollTo(0, 1);
}