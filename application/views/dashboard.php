<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Rafiki - Social Insight Engine</title>
    <meta name="description" content="Social Insight Engine.">
    <meta name="author" content="Frostbyte Data">
    <meta name="keyword" content="Social, Insight, Engine, analyze, analyzer, live, chart">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link href="<?php echo(THEME_PATH); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(THEME_PATH); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo(THEME_PATH); ?>css/style.min.css" rel="stylesheet">
    <link href="<?php echo(THEME_PATH); ?>css/style-responsive.min.css" rel="stylesheet">
    <link href="<?php echo(THEME_PATH); ?>css/retina.css" rel="stylesheet">
    <link href="<?php echo(THEME_PATH); ?>css/custom.css" rel="stylesheet">
    <!-- end: CSS -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="<?php echo(THEME_PATH); ?>css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="<?php echo(THEME_PATH); ?>css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon and Touch Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo(THEME_PATH); ?>ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo(THEME_PATH); ?>ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo(THEME_PATH); ?>ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo(THEME_PATH); ?>ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo(THEME_PATH); ?>ico/favicon.png">
    <!-- end: Favicon and Touch Icons -->




</head>

<body>
<!-- start: Header -->
<div class="navbar">
<div class="navbar-inner">
<div class="container-fluid">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="index.html"><span>Rafiki</span></a>

<!-- start: Header Menu -->
<div class="nav-no-collapse header-nav">
<ul class="nav pull-right">
<li class="dropdown hidden-phone">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="halflings-icon white warning-sign"></i>
    </a>
    <ul class="dropdown-menu notifications">
        <li>
            <span class="dropdown-menu-title">You have 11 notifications</span>
        </li>
        <li>
            <a href="#">
                + <i class="halflings-icon white user"></i> <span class="message">New user registration</span> <span class="time">1 min</span>
            </a>
        </li>
        <li>
            <a href="#">
                + <i class="halflings-icon white comment"></i> <span class="message">New comment</span> <span class="time">7 min</span>
            </a>
        </li>
        <li>
            <a class="dropdown-menu-sub-footer">View all notifications</a>
        </li>
    </ul>
</li>
<!-- start: User Dropdown -->
<li class="dropdown">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="halflings-icon white user"></i> Parker Lawson
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo(THEME_PATH); ?>login.html"><i class="halflings-icon white off"></i> Logout</a></li>
    </ul>
</li>
<!-- end: User Dropdown -->
</ul>
</div>
<!-- end: Header Menu -->

</div>
</div>
</div>
<!-- start: Header -->

<div class="container-fluid">
<div class="row-fluid">
<!-- end: Main Menu -->

<noscript>
    <div class="alert alert-block span11">
        <h4 class="alert-heading">Warning!</h4>
        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
    </div>
</noscript>

<!-- start: Content -->
<div id="content" class="span12">


<div class="row-fluid span12">

    <div class="stats-date span3">
        <div>Calls & Texts</div>
        <div class="range">Last 30 Days</div>
    </div>

    <div class="stats span8">

        <div class="stat">
            <div class="left">
                <div class="number green"><?php echo $call_count; ?></div>
                <div class="title"><span class="color green"></span>All Calls</div>
            </div>
            <div class="right">
                <div class="arrow">
                    <img src="<?php echo(THEME_PATH); ?>img/<?php echo ($call_change_percentage_arrow_direction);?>arrow.png">
                </div>
                <div class="percent"><?php echo ($call_change_percentage);?> from yesterday</div>
            </div>
        </div>
        <div class="stat">
            <div class="left">
                <div class="number blue"><?php echo $text_count; ?></div>
                <div class="title"><span class="color blue"></span>All Texts</div>
            </div>
            <div class="right">
                <div class="arrow">
                    <img src="<?php echo(THEME_PATH); ?>img/<?php echo ($text_change_percentage_arrow_direction);?>arrow.png">
                </div>
                <div class="percent"><?php echo ($text_change_percentage);?> from yesterday</div>
            </div>
        </div>

    </div>

</div>

<div class="row-fluid">

    <div id="stats-chart2"  class="span12" style="height:300px;overflow:hidden;" ></div>

</div>
<div class="row-fluid">
</div>

<hr>
</div>
<!-- start: Widgets Area -->
<div id="widgets-area" class="span2 hidden-tablet hidden-phone">
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="charts">

            <div class="bar-stat">
                <span class="title">All Time Calls</span>
                <span class="value"><?php echo $call_count; ?></span>
                <span class="chart yellow"><?php echo $mini_bar_all_calls; ?></span>
            </div>

            <hr>

            <div class="bar-stat">
                <span class="title">All Outgoing Calls</span>
                <span class="value"><?php echo $outgoing_count; ?></span>
                <span class="chart blue"><?php echo $mini_bar_all_outgoing; ?></span>
            </div>

            <hr>

            <div class="bar-stat">
                <span class="title">Answered Calls</span>
                <span class="value"><?php echo $answered_count; ?></span>
                <span class="chart green"><?php echo $mini_bar_answered; ?></span>
            </div>

            <hr>

            <div class="bar-stat">
                <span class="title">Missed Calls</span>
                <span class="value"><?php echo $missed_count; ?></span>
                <span class="chart red"><?php echo $mini_bar_missed; ?></span>
            </div>

            <hr>

            <div id="interaction-index"></div>

            <ul class="progress-bars">

                <li>
                    <span class="title">All Calls Answered</span>
                    <span class="percent"></span>
                    <div class="taskProgress progressSlim progressGreen"><?php echo round($percent_calls_answered); ?></div>
                </li>

                <li>
                    <span class="title">Contact Coverage</span>
                    <span class="percent"></span>
                    <div class="taskProgress progressSlim progressYellow">18</div>
                </li>
            </ul>

        </div>
        <div class="tab-pane" id="users">

            <ul class="users-list">
                <li>
                    <a href="#">
                        <span class="status active"></span>
                        <span class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar.jpg" alt="Avatar"></span>
                        <span class="name">?ukasz Holeczek</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="status busy"></span>
                        <span class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar2.jpg" alt="Avatar"></span>
                        <span class="name">Megan Abott</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="status disable"></span>
                        <span class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar3.jpg" alt="Avatar"></span>
                        <span class="name">Kate Ross</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="status active"></span>
                        <span class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar4.jpg" alt="Avatar"></span>
                        <span class="name">Julie Blank</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="status"></span>
                        <span class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar5.jpg" alt="Avatar"></span>
                        <span class="name">Jane Sanders</span>
                    </a>
                </li>
                <li>
                    <a href="#">View all users</a>
                </li>
            </ul>

        </div>
        <div class="tab-pane" id="messages">

            <ul class="messages-list">
                <li>
                    <a href="#">
                        <div class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar.jpg" alt="Avatar"></div>
                        <span class="name">?ukasz Holeczek</span>
                        <span class="date">25/6/2013</span>
                        <span class="title">Custom Bootstrap design for new client</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar2.jpg" alt="Avatar"></div>
                        <span class="name">Megan Abott</span>
                        <span class="date">25/6/2013</span>
                        <span class="title">Custom Bootstrap design for new client</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar3.jpg" alt="Avatar"></div>
                        <span class="name">Kate Ross</span>
                        <span class="date">25/6/2013</span>
                        <span class="title">Custom Bootstrap design for new client</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar4.jpg" alt="Avatar"></div>
                        <span class="name">Julie Blank</span>
                        <span class="date">25/6/2013</span>
                        <span class="title">Custom Bootstrap design for new client</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="avatar"><img class="img-circle" src="<?php echo(THEME_PATH); ?>img/avatar5.jpg" alt="Avatar"></div>
                        <span class="name">Jane Sanders</span>
                        <span class="date">25/6/2013</span>
                        <span class="title">Custom Bootstrap design for new client</span>
                    </a>
                </li>
                <li>
                    <a href="#">View all messages</a>
                </li>
            </ul>

        </div>
    </div>

</div>
<!-- end: Widgets Area -->
<div id="content" class="span12">
<div class="row-fluid">

<div class="widget span7" onTablet="span12" onDesktop="span7">

    <h2><span class="glyphicons globe"><i></i></span>Most Contacted - By Calls</h2>

    <hr>

    <div class="content">

        <div class="verticalChart">

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>37%</span>
                    </div>

                </div>

                <div class="title">James Hardi</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>16%</span>
                    </div>

                </div>

                <div class="title">Phil Sturgeon</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>12%</span>
                    </div>

                </div>

                <div class="title">Paul Maney</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>9%</span>
                    </div>

                </div>

                <div class="title">Stephen King</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>7%</span>
                    </div>

                </div>

                <div class="title">Chase Ijams</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>6%</span>
                    </div>

                </div>

                <div class="title">Wes Jordan</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>5%</span>
                    </div>

                </div>

                <div class="title">Colin Stewart</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>4%</span>
                    </div>

                </div>

                <div class="title">Wolgang Lampke</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>3%</span>
                    </div>

                </div>

                <div class="title">Mom</div>

            </div>

            <div class="singleBar">

                <div class="bar">

                    <div class="value">
                        <span>1%</span>
                    </div>

                </div>

                <div class="title">Caleb Lawson</div>

            </div>

        </div>

    </div>

</div><!--/span-->

<div class="box span5 noMargin" ontablet="span12" ondesktop="span5">
    <h2><i class="halflings-icon info-sign"></i><span class="break"></span>You Should Try...</h2>
    <div class="box-content">
        <div class="todo">
            <ul class="todo-list">
                <li>
                    Windows Phone 8 App <span class="label label-important">today</span>
                </li>
                <li>New frontend layout <span class="label label-important">today</span>
                </li>
                <li>Hire developers <span class="label label-warning">tommorow</span>
                </li>
            </ul>
        </div>
    </div>
</div>

</div>
<!-- end: Content -->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>
    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="#" alt="Social Insight">Rafiki</a></span>
        <span class="hidden-phone" style="text-align:right;float:right">Rafiki - Social Insight Engine</span>
    </p>
</footer>

</div><!--/.fluid-container-->

<!-- start: JavaScript-->

<script src="<?php echo(THEME_PATH); ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/jquery-migrate-1.0.0.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.ui.touch-punch.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/modernizr.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/bootstrap.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.cookie.js"></script>

<script src='<?php echo(THEME_PATH); ?>js/fullcalendar.min.js'></script>

<script src='<?php echo(THEME_PATH); ?>js/jquery.dataTables.min.js'></script>

<script src="<?php echo(THEME_PATH); ?>js/excanvas.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/jquery.flot.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/jquery.flot.pie.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/jquery.flot.stack.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/jquery.flot.resize.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/gauge.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.chosen.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.uniform.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.cleditor.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.noty.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.elfinder.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.raty.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.iphone.toggle.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.uploadify-3.1.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.gritter.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.imagesloaded.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.masonry.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.knob.modified.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/jquery.sparkline.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/counter.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/raphael.2.1.0.min.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/justgage.1.0.1.min.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/retina.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/core.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/charts.js"></script>
<script src="<?php echo(THEME_PATH); ?>js/ajax.js"></script>

<script src="<?php echo(THEME_PATH); ?>js/custom.js"></script>
<!-- end: JavaScript-->

</body>
</html>