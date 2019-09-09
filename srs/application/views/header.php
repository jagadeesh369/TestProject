<?php
#
# Copyright (c) 2019 by:
# ITCrats Info Solutions
# @author JANI SHAIK
# @created 08/08/2019
#
?>
<!Doctype html>
<html>
<head>
  <title>.:SRS Diagnostics:.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="robots" content="noindex,nofollow" />
  <meta name="keywords" content=""/>
  <meta name="description" content=""/>
  <!-- Css Files -->
  <link rel="shortcut icon" href="<?php print WEB_ROOT;?>assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/font-awesome/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/css/style_admin.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/css/style2.css"> -->

  <!-- Script Files -->
  <script type="text/javascript">var WEB_ROOT = "<?php print WEB_ROOT;?>";</script>
  <script type="text/javascript">var loader = "<div class='loader'></div>"</script>
  <script src="<?php print WEB_ROOT;?>assets/js/jquery.min.js"></script>
  <script src="<?php print WEB_ROOT;?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/angular.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/angularjs.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/angular-route.js"></script> 
 <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/angular-route.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/ui-bootstrap.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/login.js"></script>
  </head>
<body>
<div class="top-menu" style="border-top: 2px solid #0079BD;">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
         <a class="navbar-brand" href="<?php print WEB_ROOT;?>index.php/login/dashboard"><img src="<?php print WEB_ROOT;?>assets/images/ITCrats.png" alt="srsdiagnostics" 
         class="img-responsive" width="60" height="60"></a>
        <?php
        /*
        if($_SESSION['emp']['employee_type'] == 1) { ?>
          <a class="navbar-brand" href="<?php print WEB_ROOT;?>admin"><img src="<?php print WEB_ROOT;?>assets/images/meillogo.png" alt="meillogo" class="img-responsive"></a>
          <?php
        } if($_SESSION['emp']['employee_type'] == 2 || $_SESSION['emp']['employee_type'] == 4) { ?>
          <a class="navbar-brand" href="<?php print WEB_ROOT;?>png"><img src="<?php print WEB_ROOT;?>assets/images/meillogo.png" alt="meillogo" class="img-responsive"></a>
          <?php
        }if($_SESSION['emp']['employee_type'] == 3) { ?>
          <a class="navbar-brand" href="<?php print WEB_ROOT;?>cng"><img src="<?php print WEB_ROOT;?>assets/images/meillogo.png" alt="meillogo" class="img-responsive"></a>
          <?php
        }
        */
        ?>
        <!-- Module title -->
        <!-- <a class="cng-png" href="<?php print WEB_ROOT;?>admin">ADMIN</a> -->
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php print WEB_ROOT;?>index.php/login/dashboard"><i class="fa fa-home" aria-hidden="true">&nbsp;</i>Home</a></li>
          <?php /*
          <?php if($_SESSION['emp']['employee_type'] == 1) { ?>
            <li><a href="<?php print WEB_ROOT;?>admin"><i class="fa fa-home" aria-hidden="true">&nbsp;</i>Home</a></li>
            <?php
          } if($_SESSION['emp']['employee_type'] == 2 || $_SESSION['emp']['employee_type'] == 4) { ?>
            <li><a href="<?php print WEB_ROOT;?>png"><i class="fa fa-home" aria-hidden="true">&nbsp;</i>Home</a></li>
            <?php
          }if($_SESSION['emp']['employee_type'] == 3) { ?>
            <li><a href="<?php print WEB_ROOT;?>cng"><i class="fa fa-home" aria-hidden="true">&nbsp;</i>Home</a></li>
            <?php
          } ?>
          */?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true">&nbsp;</i>
              <?php
              /* switch ($_SESSION['emp']['title']) {
                case '1':$_SESSION['emp']['title'] = "Mr.";break;
                case '2':$_SESSION['emp']['title'] = "Mrs.";break;
                default:break;
              } */
              ?>
              <?php /* print $_SESSION['emp']['title'].' '.$_SESSION['emp']['firstname'].' '.$_SESSION['emp']['lastname']; */?>
              Admin
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php print WEB_ROOT;?>user/profile"><i class="fa fa-user" aria-hidden="true">&nbsp;</i>My profile</a></li>
              <li><a href="<?php print WEB_ROOT;?>user/change_password"><i class="fa fa-key" aria-hidden="true">&nbsp;</i>Change my password</a></li>
              <li><a href="<?php print WEB_ROOT;?>index.php/adminModule"><i class="fa fa-unlock-alt" aria-hidden="true">&nbsp;</i>Admin modules</a></li>
              <li><a href="<?php print WEB_ROOT;?>"><i class="fa fa-sign-out"></i>&nbsp;<?php print _("Logout");?></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>




