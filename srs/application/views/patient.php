<!-- <script>
$(document).ready(function() {
        $("#apdob").datepicker({
            dateFormat : "dd-mm-yy",
            changeMonth : true,
            changeYear : true,
            //  showButtonPanel: true,
            // before datepicker opens run this function
            beforeShow : function() {
                // this gets today's date       
                var theDate = new Date();
                theDate.setDate(theDate.getDate());
                //
                var dd = theDate.getDate();          
                var mm = theDate.getMonth() + 1;
                var yy = theDate.getFullYear() - 5;
                // set min date
                var minDate = dd + '-' + mm + '-' + yy;
                $(this).datepicker('option', 'minDate', minDate);
                // set max date
                $(this).datepicker('option', 'maxDate', theDate);
            }
        });
    });
</script> -->
<!-- <script type="text/javascript">
    $(document).ready(function($scope, $filter) {
    $('#apdob').datepicker({
    onSelect: function(value,ui) {
        var today = new Date(), 
            dob = new Date(value), 
            age = new Date(today - dob).getFullYear() - 1970;
            console.log(age);
            $scope.pdob=dob;
            console.log($scope.pdob);          
$scope.page=document.getElementById('apage').value = age;
        $(this).datepicker('option', 'page', age);
        $(this).datepicker('option', 'pdob', dob);
    },
    maxDate: '+0d',
    yearRange: '1920:today',
    changeMonth: true,
    changeYear: true,
});

});
</script> -->
<div class="container login-container" ng-app="app" ng-controller="loginController" ng-init="getPatientsData();"> 
        <div class="table-wrapper">
            <div class="row">
                <div class="col-sm-6">
                  <div>
                    <label>Search:</label><input type="text" ng-model="searchText" class="form-control input-sm" placeholder="Name/Mobile/Email/Address"/>
                </div>
                </div>
            </div>
                  <div class="table-title">
                  <div class="row">
                        <div class="col-sm-8"><h2><b>Patients</b></h2></div>
                            <div class="col-sm-4" align="right">
                            <button type="button" class="btn btn-info"data-toggle="modal" data-target="#addPatient"><i class="fa fa-plus"></i> Add Patient</button>
                            </div>
                    </div>
            </div>
            <table class="table table-bordered"> 
                <thead>
                    <tr id='tableHeader'>
                        <th width="60px">Sr no</th>
                        <th>Name</th>
                        <th width="100px">Mobile</th>
                        <th width="180px">Email</th>
                        <th width="80px">Gender</th>
                        <th>Address</th>
                        <th>Area</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr ng-repeat="p in patient|filter:paginatePatient | filter:searchText">
                        <td>{{$index + 1}}</td>
                        <td>{{p.name}}</td>
                        <td>{{p.mobile}}</td>
                        <td>{{p.email}}</td>
                        <td ng-if="p.gender == 1">Male</td>
                        <td ng-if="p.gender == 2">FeMale</td>
                        <td >{{p.address}}</td>
                        <td >{{p.area}}</td>
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="editPatient(p)" tabindex="0"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
            </table>
            <pagination total-items="patientItems" ng-model="currentPatientPage" max-size="patientItemsPerPage" class="pagination-sm pull-right" boundary-links="true" rotate="false" num-pages="numPages" 
                ng-change="patientPageChanged(currentPatientPage)"></pagination>
                <br/>
           </div>
<div id="addPatient" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" ng-click="patientData();">&times;</button>
        <h4 class="modal-title" align="center">Add Patient</h4>
      </div>
      <div class="modal-body">
        <form name="addPatient">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                            <label>Full Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="apfname" ng-model="apfname"placeholder="Enter your full name*" value=""  ng-required="true" letters-only="letters-only"/>
                          <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.apfname.$error.required">FullName is required</span>
                </div>
            <div class="row">
                <div class="col-md-6 ">
                        <div class="form-group">
                            <div ng-class="{ 'has-error' : !isSubmit && addUser.mobile.$invalid && !addUser.mobile.$pristine}">
                            <label>Contact Number:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="apcntnumber" ng-model="apcntnumber"placeholder="contact number *" value="" ng-required="true" numbers-only="numbers-only" minlength="10" maxlength="10" />
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.apcntnumber.$error.required">Contact Number is required</span>
                            <p ng-show="!isSubmit && addPatient.apcntnumber.$error.minlength" class="text-danger">Enter valid phone number</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Alternate Number:</label>
                            <input type="text" class="form-control" name="apacntnumber" ng-model="apacntnumber"placeholder="alternate contact number " value=""/>
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.apacntnumber.$error.required">Alternate Number is required</span><br/>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="form-group">
                            <label>DOB:</label>
                            <input type="text" class="form-control" name="pdob" ng-model="pdob" placeholder="DOB *" value="" id="apdob"/>
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.pdob.$error.required">dob is required</span>
                    </div>
                </div>
                <div class="col-md-4 ">
                        <div lass="form-group">
                             <label>Age:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control"  name="page" ng-model="page" placeholder="age *" value=""  id="apage"/>
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.page.$error.required">Age is required</span>
                        </div>
                </div>
                <div class="col-md-4 ">
                <div class="form-group">
                            <label>Gender:</label>
                            <span class="text-danger">*</span>
                            <!-- <input type="text" class="form-control" placeholder="Your Place *" name="adplace" ng-model="adplace" value="" /> -->
                            <select class="form-control" ng-model="apgender" name="apgender"
                                 ng-required="true">
                                    <option value="" >-- select gender --</option>
                                    <option value="1" >Male</option>
                                    <option value="2" >Female</option>
                            </select>
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.apgender.$error.required">gender is required</span>
                        </div>
            </div>
        </div>
                        <div class="form-group">
                            <div
                    ng-class="{ 'has-error' : !isSubmit && addPatient.apemail.$invalid && !addPatient.apemail.$pristine}">
                            <label>Email:</label>
                            <span class="text-danger">*</span>
                            <input type="email" name="apemail" ng-model="apemail"class="form-control" placeholder="Enter your email*" value="" ng-required="true" />
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.apemail.$error.required">email is required</span>
                            <p ng-show="!isSubmit && addPatient.apemail.$invalid && !addPatient.apemail.$pristine" class="help-block">please enter valid email</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Area:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Your area *" value="" name="aparea" ng-model="aparea" ng-required="true"/></textarea>
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.aparea.$error.required">Area is required</span>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <textarea rows="5" input type="text" class="form-control" placeholder="Your address *" value="" name="apaddress" ng-model="apaddress"/></textarea>
                            <span class="text-danger" data-ng-show="addPatient.submitted && addPatient.apaddress.$error.required">Address is required</span>
                        </div>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button  class="btn btn-primary"  ng-click="addingPatient()"tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
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
        <h4 class="modal-title" align="center">Edit Patient Details</h4>
      </div>
      <div class="modal-body">
         <form name="editPatientDetails">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="form-group">
                            <label>UserId:</label>
                            <span class="text-danger">*</span>
                            <input type="text" name="editpatient.id" ng-model="editpatient.id"class="form-control" placeholder="" value="" ng-required="true" disabled="true" />
                        </div> -->
                        <div class="form-group">
                            <label>Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text"  name="editPatientName" ng-model="editpatient.name"class="form-control" placeholder="" value="" ng-required="true" letters-only="letters-only"/>
                            <span class="text-danger" data-ng-show="editPatientDetails.submitted && editPatientDetails.editPatientName.$error.required">Name is required</span>
                        </div>
                        <div class="form-group">
                            <label>Contact Number:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="editPatientMobile" ng-model="editpatient.mobile"placeholder="contact number *" value="" ng-required="true" numbers-only="numbers-only"/>
                            <span class="text-danger" data-ng-show="editPatientDetails.submitted && editPatientDetails.editPatientMobile.$error.required">Contact Number is required</span>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <span class="text-danger">*</span>
                            <input type="email" name="editPatientEmail" ng-model="editpatient.email"class="form-control" placeholder="Enter your email*" value="" ng-required="true" />
                            <span class="text-danger" data-ng-show="editPatientDetails.submitted && editPatientDetails.editPatientEmail.$error.required">email is required</span>
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <span class="text-danger">*</span>
                            <!-- <input type="text" class="form-control" placeholder="Your Place *" name="adplace" ng-model="adplace" value="" /> -->
                            <select class="form-control" ng-model="editpatient.gender" name="editPatientGender"
                                 ng-required="true">
                                    <option value="" >-- select gender --</option>
                                    <option value="1" >Male</option>
                                    <option value="2" >Female</option>
                                </select>
                            <span class="text-danger" data-ng-show="editPatientDetails.submitted && editPatientDetails.editPatientGender.$error.required">gender is required</span>
                        </div>
                        <div class="form-group">
                            <label>Area:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Your address *" value="" name="editPatientArea" ng-model="editpatient.area" ng-required="true" /></textarea>
                            <span class="text-danger" data-ng-show="editPatientDetails.submitted && editPatientDetails.editPatientArea.$error.required">Address is required</span>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <span class="text-danger">*</span>
                            <textarea rows="5" input type="text" class="form-control" placeholder="Your address *" value="" name="editPatientAddress" ng-model="editpatient.address"/></textarea>
                            <span class="text-danger" data-ng-show="editPatientDetails.submitted && editPatientDetails.editPatientAddress.$error.required">Address is required</span>
                        </div>
                    </div>
                </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button  class="btn btn-primary"  ng-click="updatingPatients()"tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>
</div>
</div>
</div>