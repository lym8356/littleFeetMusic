<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <!--   dashboard css-->
    <?= $this->Html->css('/dashboard_css/bootstrap.min.css') ?>
    <?= $this->Html->css('/dashboard_css/datepicker3.css') ?>
    <?= $this->Html->css('/dashboard_css/styles.css') ?>

    <!-- font awesome -->
    <?= $this->Html->css('/font-awesome/css/all.min.css') ?>
    <?= $this->Html->script('/font-awesome/js/all.min.js') ?>

    <!-- date picker -->
    <?= $this->Html->css('/datepicker/css/bootstrap-datetimepicker.min.css') ?>
    <?= $this->Html->script('/datepicker/js/bootstrap-datetimepicker.min.js') ?>
    <?= $this->Html->script('/datepicker/js/moment.js') ?>

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
    <ul class="nav menu" id="sidebar_nav">
        <li class="sidebar_item active">
            <?= $this->Html->link('<svg class="glyph stroked dashboard dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> Dashboard', '/admin',
                ['escape' => false]); ?></li>
        <li class="sidebar_item">
            <?= $this->Html->link('<svg class="glyph stroked app window with content">
                    <use xlink:href="#stroked-app-window-with-content"></use>
                </svg> Manage Class', '/admin/classlfm/manage',
                ['escape' => false]); ?></li>
        <li class="sidebar_item">
            <?= $this->Html->link('<svg class="glyph stroked notepad">
                    <use xlink:href="#stroked-notepad"></use>
                </svg> Manage Booking', '/admin/booking/manage',
                ['escape' => false]); ?></li>
        <li class="sidebar_item"><a href="#">
                <svg class="glyph stroked female-user">
                    <use xlink:href="#stroked-female-user"></use>
                </svg>
               Manage User</a></li>
        <li class="sidebar_item"><a href="#">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Manage Staff</a></li>
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
        <div class="col-md-10">
            <?= $this->fetch('content') ?>
        </div><!--/.col-->
    </div><!--/.row-->
</div>    <!--/.main-->

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("sidebar_nav");
    var sidebar_ele = header.getElementsByClassName("sidebar_item");
    for (var i = 0; i < sidebar_ele.length; i++) {
        sidebar_ele[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

</script>
</body>

</html>
