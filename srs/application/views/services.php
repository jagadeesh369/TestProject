<style>
.column1{
  width: 50%;
  border: 1px solid grey;
}
.column2{
  width: 50%;
  border: 1px solid grey;
}
.bg-success {
    color: black;
    background-color: green;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
        $('#display-table').on('click', 'tbody tr', function(event) {
          $(this).addClass('bg-success').siblings().removeClass('bg-success');                  
        });
      });
</script>
<div class="container login-container"ng-app="app" ng-controller="loginController" ng-init="getServicesData();">
    <div class="row">
      <div class="col-md-4 column1" align="center">
    Service
    <div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control input-sm" placeholder="Search Service" ng-model="searchText"/>
            </br>
        </div>
        <div class="col-md-4"align="right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaAddingService"><i class="fa fa-plus"></i> Add Service</button>
        </div>
        <table class="table table-bordered" id="display-table"> 
                <thead>
                    <tr>
                        <th width="30px">Sr no</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody >
                    <tr ng-repeat="s in service|filter:searchText">
                        <td>{{$index + 1}}</td>
                        <td ng-click="getParticularService(s)">{{s.name}}</td>
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="editservice(s)" tabindex="0"  data-toggle="modal" data-target="#myModalEditService"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
          </table>
        </div>
 <div id="myModaAddingService" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Add Service</h4>
      </div>
      <div class="modal-body">
         <form name="addService">
            <div class="row" align="left">
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="asname" ng-model="asname"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="addService.submitted && addService.asname.$error.required">Name is required</span>
                        </div>
                  </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
            <button class="btn btn-dark" data-dismiss="modal" tabindex="0" ng-click="services()" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
            </button>
             <button type="button" class="btn btn-primary" ng-click="addingService();" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Save</button>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="myModalEditService" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Edit Service  Details</h4>
      </div>
      <div class="modal-body">
         <form name="editService" novalidate>
            <div class="row" align="left" >
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="editServiceName" ng-model="editservice.name"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="editService.submitted && editService.editServiceName.$error.required">Name is required</span>
                        </div>
                  </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
            <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
            </button>
             <button type="button" class="btn btn-primary" ng-click="saveService()" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
  </div>
      <div class="col-md-8 column2" align="center">
            Particulars
        <div class="row">
          <div class="col-md-8">
                <input type="text" class="form-control input-sm" placeholder="Search Particulars" ng-model="searchParticular"/>
              </br>
          </div>
          <div class="col-md-4"align="right">
                        <button  type="button"  class="btn btn-info" data-toggle="modal"  ng-click="checkingService()"><i class="fa fa-plus"></i> Add Particular</button>
           </div>
         </br>
         <table class="table table-bordered"> 
                <thead>
                    <tr id='tableHeader'>
                        <th width="30px">Sr no</th>
                        <th width="100px">Name</th>
                        <th>Price</th>
                        <th>Corporate Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr ng-repeat="p in pservices|filter:searchParticular">
                        <td>{{$index + 1}}</td>
                        <td>{{p.particular}}</td>
                        <td>{{p.price}}</td>
                        <td>{{p.corporate_price}}</td>
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="editParticular(p)" tabindex="0"  data-toggle="modal" data-target="#myModal12"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
          </table>
        </div>
        <div id="myModal123" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Adding  Particular Details</h4>
      </div>
      <div class="modal-body">
         <form name="addParticulars">
            <div class="row" align="left" >
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Enter Name*" value="" name="apname" ng-model="apname" ng-required="true"letters-only="letters-only"/>
                          <span class="text-danger" data-ng-show="addParticulars.submitted && addParticulars.apname.$error.required ">FullName is required</span>
                      </div>
                      <div class="form-group">
                            <label>Price:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Enter price*" value="" name="apprice" ng-model="apprice" ng-required="true" numbers-only="numbers-only"/>
                          <span class="text-danger" data-ng-show="addParticulars.submitted && addParticulars.apprice.$error.required ">Price is required</span>
                      </div>
                      <div class="form-group">
                            <label>Corporate Price:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Enter corporate price*" value="" name="apcprice" ng-model="apcprice" ng-required="true" numbers-only="numbers-only"/>
                          <span class="text-danger" data-ng-show="addParticulars.submitted && addParticulars.apcprice.$error.required ">Corporate Price is required</span>
                      </div>
                      	<label>
        					<input type="checkbox" name="check" ng-model="check" value="1">Active
    					</label>
                  </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
            <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
            </button>
             <button type="button" class="btn btn-primary" ng-click="addingParticular();" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="myModal12" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Edit  Particular Details</h4>
      </div>
      <div class="modal-body">
         <form name="epd" novalidate>
            <div class="row" align="left" >
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="particularName" ng-model="editparticular.particular"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="epd.submit && epd.particularName.$error.required">Name is required</span>
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="particularPrice" ng-model="editparticular.price"class="form-control" placeholder="" value="" ng-required="true"  numbers-only="numbers-only"/>
                            <span class="text-danger" data-ng-show="epd.submit && epd.particularPrice.$error.required">Price is required</span>
                        </div>
                        <div class="form-group">
                            <label>Corporate Price:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="corporatePrice" ng-model="editparticular.corporate_price"class="form-control" placeholder="" value="" ng-required="true"  numbers-only="numbers-only"/>
                            <span class="text-danger" data-ng-show="epd.submit && epd.corporatePrice.$error.required">Corporate Price is required</span>
                        </div>
                  </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
            <button class="btn btn-dark" data-dismiss="modal" tabindex="0"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
            </button>
             <button type="button" class="btn btn-primary" ng-click="updatingParticulars();" onclick="javascript:window.location.reload()" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
    </div>
</div>

