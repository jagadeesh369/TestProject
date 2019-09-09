<div class="container login-container" ng-app="app" ng-controller="loginController" ng-init="getSpecializationData();"> <div class="table-wrapper">
              <div class="row">
                <div class="col-sm-6">
                  <div>
                    <label>Search:</label><input type="text" ng-model="searchText" class="form-control input-sm" placeholder="Name"/>
                  </div>
                </div>
              </div>
                  <div class="table-title">
                  <div class="row">
                        <div class="col-sm-8"><h2>Specialization</h2></div>
                            <div class="col-sm-4" align="right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addSpecialization"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                    </div>
            </div>
            <table class="table table-bordered"> 
                <thead>
                    <tr id='tableHeader'>
                        <th width="120px">Sr no</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr ng-repeat="s in specialization|filter :paginateSpecialization| filter : searchText">
                        <td>{{$index + 1}}</td>
                        <td>{{s.name}}</td>
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="editSpecialization(s)" tabindex="0"  data-toggle="modal" data-target="#editSpecialization"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
            </table>
            <pagination total-items="specializationItems" ng-model="currentSpecializationPage" max-size="specializationItemsPerPage" class="pagination-sm pull-right" boundary-links="true" rotate="false" num-pages="numPages" 
                ng-change="specializationPageChanged(currentSpecializationPage)"></pagination>
                <br/>
        </div>
    </form>
    <div id="addSpecialization" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Add Specialization </h4>
      </div>
      <div class="modal-body">
        <form name="addSpecialization" novalidate>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="asname" ng-model="asname"placeholder="Enter your full name*" value=""  ng-required="true" letters-only="letters-only"/>
                          <span class="text-danger" data-ng-show="addSpecialization.submitted && addSpecialization.asname.$error.required">Name is required</span>
                        </div>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true" ng-click="specialServices()"></i>&nbsp;&nbsp;Cancel
        </button>
        <button  class="btn btn-primary" ng-click="addingSpecialization()"tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="editSpecialization" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Edit Specialization Details</h4>
      </div>
      <div class="modal-body">
        <form name="editSpecializationDetails" novalidate>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="specializationName" ng-model="special.name"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="editSpecializationDetails.submit && editSpecializationDetails.specializationName.$error.required">Name is required</span>
                        </div>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button  class="btn btn-primary" ng-click="editingSpecialization()" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>