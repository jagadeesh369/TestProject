<div class="container login-container" ng-app="app" ng-controller="loginController" ng-init="getHospital()"> 
          <div class="table-wrapper">
            <div class="row">
                <div class="col-sm-6">
                  <div>
                    <label>Search:</label><input type="text" ng-model="searchText" class="form-control input-sm" placeholder="Name"/>
                  </div>
                </div>
            </div>
                  <div class="table-title">
                  <div class="row">
                        <div class="col-sm-8"><h2>Hospital</h2></div>
                            <div class="col-sm-4" align="right">
                            <button type="button" class="btn btn-info"data-toggle="modal" data-target="#addHospital"><i class="fa fa-plus"></i> Add Hospital</button>
                            </div>
                    </div>
            </div>
            <table class="table table-bordered"> 
                <thead>
                    <tr id='tableHeader'>
                        <th width="60px">Sr no</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr ng-repeat="h in hospital|filter :paginateHospital | filter:searchText">
                        <td>{{$index + 1}}</td>
                        <td>{{h.name}}</td>
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="editHospital(h)" tabindex="0"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
            </table>
            <pagination total-items="hospitalItems" ng-model="currentHospitalPage" max-size="hospitalItemsPerPage" class="pagination-sm pull-right" boundary-links="true" rotate="false" num-pages="numPages" 
                ng-change="hospitalPageChanged(currentHospitalPage)"></pagination>
                <br/>
        </div>
         <div id="addHospital" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Add Hospital</h4>
      </div>
      <div class="modal-body">
        <form name="addhospital">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="ahname" ng-model="ahname"placeholder="Enter hospital name*" value=""  ng-required="true" letters-only="letters-only"/>
                          <span class="text-danger" data-ng-show="addhospital.submitted && addhospital.ahname.$error.required">Hospital Name is required</span>
                </div>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button  class="btn btn-primary"  ng-click="addingHospital()" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Edit Hospital Details</h4>
      </div>
      <div class="modal-body">
        <form name="editHospitalDetails">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Name:</label>
                  <span class="text-danger">*</span>
                  <input type="text"  name="editHospitalName" ng-model="edithospital.name"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                  <span class="text-danger" data-ng-show="editHospitalDetails.submitted && editHospitalDetails.editHospitalName.$error.required">Hospital Name is required</span>
                </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button  class="btn btn-primary"  ng-click="editingHospital()"tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>