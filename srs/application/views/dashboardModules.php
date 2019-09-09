<style>
 .modules{
  margin-bottom:5%;
 } 
</style>
<div class="modules" ng-app="app" ng-controller="loginController" ng-init="getDoctorsData();">
<div class="bg-megha">
  <div class="container-fluid">
    <div class="row">
      <div class="main-title" align="center">
        <h2>SRS Daignostics Daily Data</h2>
      </div>
    </div>
  </div>
</div>
</br>
<div class="row">
<div class="container col-md-3">           
  <table class="table table-bordered table-responsive table-condensed" >
    <thead>
      <tr>
          <th>S.No:</th>
          <th>Modality Name</th>
          <th width="20%">No: of Cases</th>
          <th>Revenue</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>MRI</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>2</td>
        <td>CT</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td>MAMMOGRAPHY</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>4</td>
        <td>ULTRA SOUND</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>5</td>
        <td>X-RAY</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>6</td>
        <td>LAB</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>7</td>
        <td>OTHERS</td>
        <td></td>
        <td></td>
      </tr>
      <tr align="center">
        <td colspan="2">Total</td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container col-md-3">           
  <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3">MRI Stats</th>
        </tr>
    <tr align="center">
          <th width="10%">S.No:</th>
          <th>Referral Doctor Name</th>
          <th width="20%">No: of Cases</th>
    </tr>
    </thead>
    <tbody>
      <tr ng-repeat="d in doctors">
        <td>{{$index + 1}}</td>
        <td>{{d.name}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container col-md-3">           
  <table class="table table-bordered">
      <thead>
        <tr >
          <th colspan="3">CT Stats</th>
        </tr>
    <tr>
          <th width="10%">S.No:</th>
          <th>Referral Doctor Name</th>
          <th width="20%">No: of Cases</th>
    </tr>
    </thead>
    <tbody>
      <tr ng-repeat="d in doctors">
        <td>{{$index + 1}}</td>
        <td>{{d.name}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container col-md-3">           
  <table class="table table-bordered">
      <thead>
        <tr >
          <th colspan="3">Ultra Sound Stats</th>
        </tr>
    <tr>
          <th width="10%">S.No:</th>
          <th>Referral Doctor Name</th>
          <th width="20%">No: of Cases</th>
    </tr>
    </thead>
    <tbody>
      <tr ng-repeat="d in doctors">
        <td>{{$index + 1}}</td>
        <td>{{d.name}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<div class="bg-megha">
  <div class="container-fluid">
    <div class="row">
      <div class="main-title" align="center">
        <h2>SRS Daignostics Month to Date Data</h2>
      </div>
    </div>
  </div>
</div>
</br>
<div class="row">
<div class="container col-md-3">           
  <table class="table table-bordered table-responsive table-condensed" >
    <thead>
      <tr>
          <th width="10%">S.No:</th>
          <th>Modality Name</th>
          <th>No: of Cases</th>
          <th>Revenue</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>MRI</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>2</td>
        <td>CT</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td>MAMMOGRAPHY</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>4</td>
        <td>ULTRA SOUND</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>5</td>
        <td>X-RAY</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>6</td>
        <td>LAB</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>7</td>
        <td>OTHERS</td>
        <td></td>
        <td></td>
      </tr>
      <tr align="center">
        <td colspan="2">Total</td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container col-md-3">           
  <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3">MRI Stats</th>
        </tr>
    <tr>
          <th width="10%">S.No:</th>
          <th>Referral Doctor Name</th>
          <th width="20%">No: of Cases</th>
    </tr>
    </thead>
    <tbody>
      <tr ng-repeat="d in doctors">
        <td>{{$index + 1}}</td>
        <td>{{d.name}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container col-md-3">           
  <table class="table table-bordered">
      <thead>
        <tr >
          <th colspan="3">CT Stats</th>
        </tr>
    <tr>
          <th width="10%">S.No:</th>
          <th>Referral Doctor Name</th>
          <th width="20%">No: of Cases</th>
    </tr>
    </thead>
    <tbody>
      <tr ng-repeat="d in doctors">
        <td>{{$index + 1}}</td>
        <td>{{d.name}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container col-md-3">           
  <table class="table table-bordered">
      <thead>
        <tr >
          <th colspan="3">Ultra Sound Stats</th>
        </tr>
    <tr>
          <th width="10%">S.No:</th>
          <th>Referral Doctor Name</th>
          <th width="20%">No: of Cases</th>
    </tr>
    </thead>
    <tbody>
      <tr ng-repeat="d in doctors">
        <td>{{$index + 1}}</td>
        <td>{{d.name}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>

