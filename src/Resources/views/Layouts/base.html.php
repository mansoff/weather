<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/awesome.css" />
    <title><?php $view['slots']->output('title', 'Weather Application') ?></title>
</head>
<body>


<div class="container">
    <?php $view['slots']->output('_content') ?>
</div>

<script defer src="/js/jquery-3.3.1.min.js"></script>
<script defer src="/js/bootstrap.js" ></script>
<script defer src="/js/main.js" ></script>
</body>
</html>
