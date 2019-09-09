<!DOCTYPE html>
<html>
<head>
  <title>SRS Diagnostics</title>
  <meta charset="utf-8">
  <meta name="robots" content="index,follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="keywords" content="" />
  <meta name="description" content=""/>
  <link rel="Shortcut Icon" href="&"/>
  <!-- CSS Files -->
  <link rel="icon" href="" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/font-awesome/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php print WEB_ROOT;?>assets/css/login.css">
  <!-- Script Files -->
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/angularjs.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/ui-bootstrap.js"></script>
  <script type="text/javascript" src="<?php print WEB_ROOT;?>assets/js/login.js"></script>
</head>
<body>
  <div class="container" ng-app="app" ng-controller="loginController">
    <div class="login-box">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
          <div class="bolck-log">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="leftImg">
                  <img src="<?php print WEB_ROOT;?>assets/images/left-img.jpg" class="img-responsive" alt="img">
                  <div class="left-desc">
                    <h1>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.</p>
                      <div class="left-foot">© 2019 SRS Diagnostics All Rights Reserved. </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="right-form">
                  <div class="rlogo" align="center">
                    <img src="<?php print WEB_ROOT;?>assets/images/logo.png" alt="logo" width="150" />
                  </div>
                  <div class="login-title" align="center">
                    <h2>Log in</h2>
                  </div>
                  <div class="logs-form">
                    <form name="user" novalidate>
                      <div class="form-group">
                        <label>Email</label>
                            <span class="text-danger">*</span>
                            <input type="email" class="form-control" placeholder="Email" name="userEmail" ng-model="userEmail" ng-required="true"/>
                            <span class="text-danger" data-ng-show="user.submitted && user.userEmail.$error.required ">Email is required</span>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                            <span class="text-danger">*</span>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="userPassword" ng-model="userPassword" ng-required="true">
                            <span class="text-danger" data-ng-show="user.submitted && user.userPassword.$error.required ">Password is required</span>
                      </div>
                      <div class="form-group">
                        <label>Type</label>
                        <span class="text-danger">*</span>
                            <select class="form-control" ng-model="userType" name="userType" ng-required="true"
                                    >
                              <option>-- Select --</option>
                              <option value="1">Admin</option>
                              <option value="2">Doctor</option>
                              <option value="3">Receptionist</option>
                              <option value="4">Patient</option>
                            </select>
                        <span class="text-danger" data-ng-show="user.submitted && user.userType.$error.required">Type is required</span>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
                      </div>
                      <button type="submit" class="btn btn-lg btn-block log-btn" ng-click="login()">LOG IN</button>
                    </form>
                  </div>
                  <div class="forgot"><a href="#">Forgot password?</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html> 