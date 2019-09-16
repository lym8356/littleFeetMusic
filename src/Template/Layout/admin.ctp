<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>


    <!--   dashboard css-->
    <?= $this->Html->css('/dashboard_css/bootstrap.min.css') ?>
    <?= $this->Html->css('/dashboard_css/datepicker3.css') ?>
    <?= $this->Html->css('/dashboard_css/styles.css') ?>

    <!--   dashboard js-->
    <?= $this->Html->script('dashboard_js/jquery-1.11.1.min.js') ?>
    <?= $this->Html->script('dashboard_js/bootstrap.min.js') ?>
    <?= $this->Html->script('dashboard_js/bootstrap-datepicker.js') ?>

    <!--Icons-->
    <?= $this->Html->script('/dashboard_js/lumino.glyphs.js') ?>

    <!--    <[if lt IE 9]>-->
    <!--    <script src="js/html5shiv.js"></script>-->
    <!--    <script src="js/respond.min.js"></script>-->
    <!--    <![endif]-->-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>LFM &nbsp;</span>Admin</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="index.html">
                <svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg>
                Dashboard</a></li>
        <li><a href="#">
            <?= $this->Html->link('<svg class="glyph stroked app window with content">
                    <use xlink:href="#stroked-app-window-with-content"></use>
                </svg> Manage Class', '/admin/class/manage',
                ['escape' => false]); ?></li>
        <li><a href="#">
                <svg class="glyph stroked female-user">
                    <use xlink:href="#stroked-female-user"></use>
                </svg>
               Manage User</a></li>
        <li><a href="#">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Manage Admin</a></li>
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
        <div class="col-md-8">
            <?= $this->fetch('content') ?>
        </div><!--/.col-->
    </div><!--/.row-->
</div>    <!--/.main-->
</body>

</html>
