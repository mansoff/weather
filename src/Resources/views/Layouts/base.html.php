<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title><?php $view['slots']->output('title', 'Hello Application') ?></title>
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
