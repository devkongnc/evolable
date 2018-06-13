<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Page Not Found</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/error/css/style.css'; ?>">
    </head>
    <body>
        <div class="error-block">
            <div class="container">
                <div class="inner">
                    <h1 class="logo">
                        <img src="<?php echo get_template_directory_uri() . '/error/images/logo.png'; ?>" alt="Evolable Asia" class="img-responsive">
                    </h1>
                    <div class="warning-block">
                        <h2 class="">404</h2>
                        <div class="content">
                            <b>URLが間違っているか、ページが削除されたようです。<br><a href="<?php echo bloginfo('url') ?>">トップページへ戻る</a></b>
                            <p>Not Found<br><a href="<?php echo bloginfo('url') ?>">Go to Home</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
