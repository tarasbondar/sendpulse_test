<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sendpulse test</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <?php
        include('php/db.php');
        session_start();
        $user_id = $_SESSION['user_id'];
    ?>

</head>

<body>

<div class="container">
    <?php
        $task = array();
        if (isset($_GET['task']) && $_GET['task'] > 0) {
            $sql = "SELECT * FROM tasks WHERE id = {$_GET['task']} AND owner_id = {$user_id};";
            $result = $db->query($sql);
            if (mysqli_num_rows($result) == 1) {
                $task = $result->fetch_assoc();
            } else { //you should not be here
                header('Location: /blog.php'); exit;
            }
        }
    ?>

    <form class="form-task">
        <h2 class="form-signin-heading">Task editor</h2>

        <input type="hidden" id="taskId" class="form-control" title="taskId" value="<?php echo $task['id'] ?? '0' ?>">
        <input type="hidden" id="userId" class="form-control" title="userId" value="<?php echo $user_id;?>">

        <label for="taskTitle" class="sr-only">Title</label>
        <input type="text" id="taskTitle" class="form-control" placeholder="Title" <?php echo ($task ? 'value="'.$task['title'].'"': '');?> required>

        <label for="taskDate" class="sr-only">Date</label>
        <div class="col-lg-12 no-side-padding">
        <input type="text" id="taskDate" class="form-control" value = '<?php echo ($task ? $task['assigned_time'] : date('Y-m-d H:i:s')); ?>' required>
        </div>

        <label for="taskDescr" class="sr-only">Description</label>
        <textarea id="taskDescr" class="form-control" placeholder="Description" rows=5 required><?php echo ($task ? $task['descr']: '');?></textarea>

        <hr>
        <button class="btn btn-success" type="submit">Save</button>
        <button class="btn btn-default return-task">Return</button>
    </form>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/moment.js"></script>
<script src="bootstrap/js/transition.min.js"></script>
<script src="datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#taskDate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            defaultDate: new Date()
        });
    });
</script>


</body>
</html>
