<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Мини Блог"/>
    <title>Мини Блог</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>css/bootstrap.css" rel="stylesheet" type="text/css"
          media="all">
    <link href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>css/style.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>js/script.js"></script>
</head>
<body>
<!-- header -->

<div class="header">
    <div class="container">
        <div class="logo">
            <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>"><img
                        src="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>images/lastlogo.png"
                        class="img-responsive" alt=""></a>
        </div>
        <div class="header-bottom">
            <div class="head-nav col-md-offset-2">
                <span class="menu"> </span>
                <ul class="cl-effect-3">
                    <div class="col-md-offset-9">
                        <li><a href="<?= 'http://' . $_SERVER['HTTP_HOST'] ?>">Главная</a></li>
                    </div>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <!-- script-for-nav -->
            <script>
                $("span.menu").click(function () {
                    $(".head-nav ul").slideToggle(300, function () {
                        // Animation complete.
                    });
                });
            </script>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- header -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="popular">Популярное:</h3>
            <div id="testimonial-slider" class="owl-carousel">
                <?php if (!empty($extra_data['top_notes'])) : ?>
                    <?php foreach ($extra_data['top_notes'] as $row): ?>
                        <div class="testimonial">
                            <div class="pic">
                                <img src="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>images/avatar.png" alt="">
                            </div>
                            <br>
                            <h3 class="testimonial-title"><?= $row['username'] ?></h3>
                            <small class="post">Комментариев - <?= $row['comments_count'] ?></small>
                            <p class="description">
                                <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/note/view/id/' . $row['id'] ?>">
                                    <?= $row['text'] ?>
                                </a>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- ./owl-carousel -->
        </div><!-- ./col-md-offset-2 col-md-8 -->
    </div><!-- ./row -->
</div><!-- ./container -->
</div>
<div class="main">
    <div class="container">
        <h3 class="popular">Публикации:</h3>
        <br>
        <div class="content">
            <?php include_once '../application/views/' . $content_view; ?>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer">
    <div class="container">
        <p style="text-align: center">Copyrights © 2017 Mini Blog All rights reserved | Developed by Victor</p>
    </div>
</div>
<!-- footer -->
<a id="toTop"><i class="fa fa-caret-up" style="font-size:72px"></i></a>
</body>
</html>

