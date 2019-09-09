<div ng-app="app" ng-controller="loginController">
<div class="panel-group" id="accordion">

  <div class="panel panel-default">
    <div class="panel-heading left-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse">Patients</a>
      </h4>
    </div>
    <div id="collapse" class="panel-collapse collapse">
      <ul class="list-group list-menu">
        <li class="list-group-item">
          <a href="patient" class="menu-mg">Add Patient</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading left-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-1">Referral Doctors</a>
      </h4>
    </div>
    <div id="collapse-1" class="panel-collapse collapse">
      <ul class="list-group list-menu">
        <li class="list-group-item">
          <a href="referralDoctors" class="menu-mg">Add Referral Doctor</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading left-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-2">UserAccounts</a>
      </h4>
    </div>
    <div id="collapse-2" class="panel-collapse collapse">
      <ul class="list-group list-menu">
        <li class="list-group-item">
          <a href="userAccounts" class="menu-mg">Add UserAccount</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading left-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-3">ParticularServices</a>
      </h4>
    </div>
    <div id="collapse-3" class="panel-collapse collapse">
      <ul class="list-group list-menu">
        <li class="list-group-item">
          <a href="services" class="menu-mg">Add ParticularService</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading left-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-4">Specialization</a>
      </h4>
    </div>
    <div id="collapse-4" class="panel-collapse collapse">
      <ul class="list-group list-menu">
        <li class="list-group-item">
          <a href="specialization" class="menu-mg">Add Specialization</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading left-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-5">Hospital</a>
      </h4>
    </div>
    <div id="collapse-5" class="panel-collapse collapse">
      <ul class="list-group list-menu">
        <li class="list-group-item">
          <a href="hospital" class="menu-mg">Add Hospital</a>
        </li>
      </ul>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    var $cat = $('select[name=category]'),
    $items = $('select[name=items]');
    $cat.change(function(){
      var $this = $(this).find(':selected'),
      rel = $this.attr('rel'),
      $set = $items.find('option.' + rel);
      if ($set.size() < 0) {
        $items.hide();
        return;
      }
      $items.show().find('option').hide();
      $set.show().first().prop('selected', true);
    });
  });
</script>
<!-- <script>
    var app = angular.module('app',["ngRoute"]);
    app.config(function($routeProvider){
        $routeProvider.
        when("/addPatient",{
            templateUrl : "patient.php"
        })
    });
</script> -->
<script type="text/javascript" src="https://code.angularjs.org/1.5.9/angular.min.js"></script>
<script  type="text/javascript"  src="https://code.angularjs.org/1.5.9/angular-route.js"></script>
<style type="text/css">
  #accordion .glyphicon {
    margin-right:10px;
  }
  .panel-collapse>.list-group .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .panel-collapse>.list-group .list-group-item {
    border-width: 1px 0;
  }
  .panel-collapse>.list-group {
    margin-bottom: 0;
  }
  .panel-collapse .list-group-item {
    border-radius:0;
  }
 .panel-default > .left-heading {
    padding: 0;
  }
  .left-heading a {
    padding: 12px 15px;
    display: inline-block;
    width: 100%;
    background-color: #f5f5f5;
    position: relative;
    text-decoration: none;
    font-size: 16px;
    color: #333333;
  }
  .left-heading a:after {
    font-family: "FontAwesome";
    content: "\f106";
    position: absolute;
    right: 20px;
    font-size: 16px;
    font-weight: 600;
    top: 50%;
    line-height: 1;
    margin-top: -10px;
  }
  .left-heading a.collapsed:after {
    content: "\f107";
  }
  .list-menu .list-group-item {
    padding: 0px;
  }
  .list-menu .list-group-item a {
    color: #333333;
    display: block;
    padding: 8px 15px;
  }
  .list-menu .list-group-item a:hover {
    color: #3376BC;
    background-color: #f8f8f8;
  }
  .list-group-item.active {
    border-color: transparent !important;
  }
  .list-group-item.active a {
    color: #ffffff;
  }
</style>