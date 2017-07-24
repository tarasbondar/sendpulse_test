<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sendpulse test</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <?php session_start(); ?>
    </head>
<body>

<?php
$tasks = array();
if (!($_SESSION && $_SESSION['user_id'] > 0)) {
    header('Location: /');
} else {
    include('php/db.php');
    $sql = "SELECT title, assigned_time, descr, id FROM tasks WHERE owner_id = {$_SESSION['user_id']} AND status = 0 ORDER BY assigned_time DESC";
    $result = $db->query($sql);
    $tasks = $result->fetch_all();
}
?>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><button class="btn btn-primary new-task">New task</button></li>
                <li role="presentation"><button class="btn btn-default logout">Logout</button></li>
            </ul>
        </nav>
        <h3 class="text-muted">Hello, <?php echo $_SESSION['user_name'];?></h3>
    </div>

    <div class="blog-header">
        <h1 class="blog-title">Your tasks</h1>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
            if (count($tasks) > 0):
                foreach ($tasks as $task): ?>
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php echo $task[0]; ?></h2>

                        <p class="blog-post-meta">Scheduled for <?php echo substr($task[1], 0, -3); ?></p>

                        <p><?php echo $task[2]; ?></p>

                        <button type="button" class="btn btn-success mark-task task-<?php echo $task[3]; ?>">Mark as done</button>
                        <button type="button" class="btn btn-default edit-task task-<?php echo $task[3]; ?>">Edit</button>
                        <button type="button" class="btn btn-danger  del-task  task-<?php echo $task[3]; ?>">Delete</button>
                    </div>
                <?php endforeach;
            else: ?>
                <p>You have no scheduled tasks.</p>
            <?php endif ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
             <div class="sidebar-module sidebar-module-inset">
              <h4>Info section</h4>
              <p>Might be some info, stats, options etc.</p>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
