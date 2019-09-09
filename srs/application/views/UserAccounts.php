<div class="container login-container" ng-app="app" ng-controller="loginController" ng-init="getEmployeeData();getRoleData();"> 
	<div class="table-wrapper">
        <div class="row">
                <div class="col-sm-6">
                  <div>
                    <label>Search:</label><input type="text" class="form-control input-sm" placeholder="Name/Email/Mobile" ng-model="searchText"/>
                  </div>
                </div>
        </div>
                  <div class="table-title">
                  <div class="row">
                    <div class="col-sm-8"><h2>User Accounts</h2></div>
                     <div class="col-sm-4" align="right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addUsers"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
            </div>
            <table class="table table-bordered"> 
                <thead>
                    <tr id='tableHeader'>
                        <th width="60px">Sr no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr ng-repeat="e in employees| filter : paginateUser | filter:searchText">
                        <td>{{$index + 1}}</td>
                        <td>{{e.name}}</td>
                        <td>{{e.email}}</td>
                        <td>{{e.mobile}}</td>
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="edituser(e)" tabindex="0"  data-toggle="modal" data-target="#myModal123"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
                </table>
            <pagination total-items="totalItems" ng-model="currentUserPage" max-size="itemsPerPage" class="pagination-sm pull-right" boundary-links="true" rotate="false" num-pages="numPages" 
				ng-change="pageChanged(currentUserPage)"></pagination>
				<br/>
            </div>
<div id="addUsers" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Add User</h4>
      </div>
      <div class="modal-body">
         <form name="addUser" novalidate="">
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                            <label>Full Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" name="fullname" ng-model="fullname"class="form-control" placeholder="Enter your name*" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="addUser.submit && addUser.fullname.$error.required">Name is required</span>
                        </div>
                        <div class="form-group">
                            <div
                    ng-class="{ 'has-error' : !isSubmit && addUser.auemail.$invalid && !addUser.auemail.$pristine}">
                            <label>Email:</label>
                            <span class="text-danger">*</span>
                            <input type="email" name="auemail" ng-model="auemail"class="form-control" placeholder="Enter your email*" value="" ng-required="true" />
                            <span class="text-danger" data-ng-show=" !isSubmit && addUser.submit && addUser.auemail.$error.required">email is required</span>
                            <!-- <p ng-show="!isSubmit && addUser.auemail.$invalid && !addUser.auemail.$pristine" class="help-block">please enter valid email</p>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <div ng-class="{ 'has-error' : !isSubmit && addUser.mobile.$invalid && !addUser.mobile.$pristine}">
                            <label>Mobile Number:</label>
                            <span class="text-danger">*</span>
                            <input type="text" name="mobile" ng-model="mobile"class="form-control" placeholder="Your Mobile Number" value="" ng-required="true" numbers-only="numbers-only" minlength="10" maxlength="10" />
                            <span class="text-danger" data-ng-show="addUser.submit && addUser.mobile.$error.required">mobile number is required</span>
                            <!-- <p ng-show="!isSubmit && addUser.mobile.$error.minlength" class="text-danger">Enter valid phone number</p> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Role:</label>
                            <span class="text-danger">*</span>
                            <select class="form-control" ng-model="role" name="role"
                                     ng-options="b.id as b.name for b in roles" ng-required="true"/>
                                    <option value="" >-- select role --</option>
                            </select>
                            <span class="text-danger" data-ng-show="addUser.submit && addUser.role.$error.required">role is required</span>
                        </div>     
                  </div>
                </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true" ng-click="userAccounts()"></i>&nbsp;&nbsp;Cancel
        </button>
        <button type="button" class="btn btn-primary"  ng-click="addingUser()"tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<div id="myModal123" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Edit Employee Details</h4>
      </div>
      <div class="modal-body">
         <form name="eed" novalidate="">
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="editEmployeeName" ng-model="editEmployee.name"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="eed.submitted && eed.editEmployeeName.$error.required">Name is required</span>
                        </div>
                        <div class="form-group">
                            <!-- <div
                    ng-class="{ 'has-error' : !isSubmit && eed.editEmployeeEmail.$invalid && !eed.editEmployeeEmail.$pristine}"> -->
                            <label>Email:</label>
                            <span class="text-danger">*</span>
                            <input type="email" name="editEmployeeEmail" ng-model="editEmployee.email"class="form-control" placeholder="" value="" ng-required="true"/>
                            <span class="text-danger" data-ng-show="eed.submitted && eed.editEmployeeEmail.$error.required">email is required</span>
                           <!--  <p ng-show="!isSubmit && eed.editEmployeeEmail.$invalid && !eed.editEmployeeEmail.$pristine" class="help-block">please enter valid email</p> -->
                        <!-- </div> -->
                        </div>
                        <div class="form-group">
                            <!-- <div ng-class="{ 'has-error' : !isSubmit && eed.editEmployeeMobile.$invalid && !eed.editEmployeeMobile.$pristine}"> -->
                            <label>mobile:</label>
                            <span class="text-danger">*</span>
                            <input type="" name="editEmployeeMobile" ng-model="editEmployee.mobile"class="form-control" placeholder="" value="" ng-required="true" numbers-only="numbers-only"minlength="10" maxlength="10"/>
                            <span class="text-danger" data-ng-show="eed.submitted && eed.editEmployeeMobile.$error.required">mobile number is required</span>
                            <!-- <p ng-show="!isSubmit && eed.editEmployeeMobile.$error.minlength" class="help-block">Enter valid phone number</p> -->
                        <!-- </div> -->
                        </div>
                        <!-- <div class="form-group">
                            <label>Role:</label>
                            <span class="text-danger">*</span>
                            <input type="text" name="editEmployeeRole" ng-model="editEmployee.role"class="form-control" placeholder="" value="" ng-required="true"/>
                            <span class="text-danger" data-ng-show="eed.submitted && eed.editEmployeeRole.$error.required">Role is required</span>
                        </div> -->
                  </div>
                </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button type="button" class="btn btn-primary" ng-click="saveEmployee()" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
