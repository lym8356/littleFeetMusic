<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>

    <!--   dashboard css-->
    <?= $this->Html->css('/dashboard/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/dashboard/css/datepicker3.css') ?>
    <?= $this->Html->css('/dashboard/css/styles.css') ?>

    <!-- font awesome -->
    <?= $this->Html->css('/font-awesome/css/all.min.css') ?>
    <?= $this->Html->script('/font-awesome/js/all.min.js') ?>


    <!--   dashboard js-->
    <?= $this->Html->script('/dashboard/js/jquery-1.11.1.min.js') ?>
    <?= $this->Html->script('/dashboard/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/dashboard/js/bootstrap-datepicker.js') ?>

    <!--Icons-->
    <?= $this->Html->script('/dashboard/js/lumino.glyphs.js') ?>

    <!-- Full Calendar Resources -->
    <?= $this->Html->css('/full_calendar/css/fullcalendar.min', ['plugin' => true]); ?>
    <?= $this->Html->css('/full_calendar/css/jquery.qtip.min', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/lib/moment.min.js', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/fullcalendar.js', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/jquery.qtip.min.js', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/ready.js', ['plugin' => true]); ?>

    <!--    <[if lt IE 9]>-->
    <!--    <script src="js/html5shiv.js"></script>-->
    <!--    <script src="js/respond.min.js"></script>-->
    <!--    <![endif]-->-->

</head>

<body>
<?php echo $this->element('admin/adminheader') ?>

<?php $controller=$this->request->params['controller'];
$action=$this->request->params['action'];
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu" id="sidebar_nav">
        <li class="sidebar_item <?php echo ($controller=='Admin')?'active':'';?>">
            <?= $this->Html->link('<svg class="glyph stroked dashboard dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> Dashboard', '/admin',
                ['escape' => false]); ?></li>
        <li class="sidebar_item <?php echo ($controller=='Terms')?'active':'';?>">
            <?= $this->Html->link('<svg class="glyph stroked app window with content">
                    <use xlink:href="#stroked-app-window-with-content"></use>
                </svg> Manage Term', '/admin/terms/index',
                ['escape' => false]); ?></li>
        <li class="sidebar_item <?php echo ($controller=='Enrolments')?'active':'';?>">
            <?= $this->Html->link('<svg class="glyph stroked notepad">
                    <use xlink:href="#stroked-notepad"></use>
                </svg> Manage Enrolment', '/admin/enrolments/index',
                ['escape' => false]); ?></li>
        <li class="sidebar_item <?php echo ($controller=='Users')?'active':'';?>">
            <?= $this->Html->link('<svg class="glyph stroked female-user">)                
                    <use xlink:href="#stroked-female-user"></use>
                </svg> Manage User', '/admin/users/index',
                ['escape' => false]); ?></li>
        <li class="sidebar_item"><a href="#">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Manage Staff</a></li>

        <li class="sidebar_item <?php echo ($controller=='Locations')?'active':'';?>">
            <?= $this->Html->link('<svg class="glyph stroked app window with content">
                    <use xlink:href="#stroked-app-window-with-content"></use>
        </svg> Manage Location', '/admin/locations/index',
            ['escape' => false]); ?></li>

        <li role="presentation" class="divider"></li>
        <li>
            <?= $this->Html->link('<svg class="glyph stroked male-user">
                <use xlink:href="#stroked-male-user"></use>
            </svg> Logout', '/Logout',
                ['escape' => false]); ?></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a></li>
            <li class="active">Icons</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <?= $this->fetch('content') ?>
        </div><!--/.col-->
    </div><!--/.row-->
</div>    <!--/.main-->

</body>

</html>
