<div class="container login-container" ng-app="app" ng-controller="loginController" ng-init="getDoctorsData();getSpecializationData();getHospital();">
    <!-- <form name="doctorsshow"  novalidate> -->
        <div class="table-wrapper">
        <div class="row">
            <div class="col-sm-6">
                  <div>
                        <label>Search:</label><input type="text" class="form-control input-sm" placeholder="Name/Specialization/Mobile/Email" ng-model="searchText"/>
                  </div>
            </div>
        </div>
            <div class="table-title">
                <div class="row">
                    <div class="col-md-8"><h2>Referral Doctors</h2></div>
                    <div class="col-md-4" align="right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addReferralDoctor"><i class="fa fa-plus"></i>Add Doctor</button>
                    </div>

                </div>
            </div>
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th width="60px">Sr no</th>
                        <th>Name</th>
                        <th>Specilization</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <!-- <th>Hospital</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTableDoctors">
                    <tr ng-repeat="d in doctors | filter : paginateDoctor | filter:searchText">
                        <td>{{$index + 1}}</td>
                        <td>{{d.name}}</td>
                        <td>{{d.name_1}}</td>
                        <td>{{d.mobile}}</td>
                        <td>{{d.email}}</td>
                        <!-- <td>{{d.hospital}}</td> -->
                        <td align="center">
                          <button type="button" class="btn btn-info" ng-click="editDoctor(d)" tabindex="0" data-toggle="modal" data-target="#editReferralDoctor"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>Edit</button>
                        </td>
                    </tr>      
                </tbody>
            </table>
            <pagination  total-items="items" ng-model="currentDoctorPage" max-size="doctorItemsPerPage" class="pagination-sm pull-right" boundary-links="true" rotate="false" num-pages="numPages" 
                ng-change="doctorPageChanged(currentDoctorPage)"></pagination>
                <br/>
        </div>
        <div id="addReferralDoctor" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Add Referral Doctor</h4>
      </div>
      <div class="modal-body">
         <form name="addDoctor" novalidate="">
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="adfname" ng-model="adfname"placeholder="Enter your full name*" value=""  ng-required="true" letters-only="letters-only"/>
                          <span class="text-danger" data-ng-show="addDoctor.submitted && addDoctor.adfname.$error.required">FullName is required</span>
                        </div>
                        <div class="form-group">
                            <div ng-class="{ 'has-error' : !isSubmit && addDoctor.adcntnumber.$invalid && !addDoctor.adcntnumber.$pristine}">
                                <label>Contact Number:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="adcntnumber" ng-model="adcntnumber"placeholder="contact number *" value="" ng-required="true" numbers-only="numbers-only" minlength="10" maxlength="10" />
                                <span class="text-danger" data-ng-show="addDoctor.submitted && addDoctor.adcntnumber.$error.required">Contact Number is required</span>
                                <!-- <p ng-show="!isSubmit && addDoctor.adcntnumber.$error.minlength" class="text-danger">Enter Valid Contact number</p> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Specilization:</label>
                            <span class="text-danger">*</span>
                            <select class="form-control" ng-model="adspecilization" name="adspecilization"
                                     ng-options="b.id as b.name for b in specialization" ng-required="true" ng-init="">
                                    <option value="" >-- select specialization --</option>
                            </select>
                            <span class="text-danger" data-ng-show="addDoctor.submitted && addDoctor.adspecilization.$error.required">Specilization is required</span>
                        </div>
                        <div class="form-group">
                             <div
                    ng-class="{ 'has-error' : !isSubmit && addDoctor.ademail.$invalid && !addDoctor.ademail.$pristine}">
                                <label>Email:</label>
                                <span class="text-danger">*</span>
                                <input type="email" name="ademail" ng-model="ademail"class="form-control" placeholder="Enter your email*" value="" ng-required="true"/>
                                <span class="text-danger" data-ng-show="addDoctor.submitted && addDoctor.ademail.$error.required">email is required</span>
                                <!-- <p ng-show="!isSubmit && addDoctor.ademail.$invalid && !addDoctor.ademail.$pristine" class="help-block">please enter valid email</p> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hospital:</label>
                            <span class="text-danger">*</span>
                            <select class="form-control" ng-model="adhospital" name="adhospital"
                                     ng-options="b.id as b.name for b in hospital" ng-required="true" ng-init="">
                                    <option value="" >-- select hospital --</option>
                            </select>
                            <span class="text-danger" data-ng-show="addDoctor.submitted && addDoctor.adhospital.$error.required">Hospital Name is required</span>
                        </div>     
                  </div>
                </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true" ng-click="referralDoctors()"></i>&nbsp;&nbsp;Cancel
        </button>
        <button type="button" class="btn btn-primary"  ng-click="addingDoctors()"tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="editReferralDoctor" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Edit Referral Doctor</h4>
      </div>
<div class="modal-body">
    <form name="editDoctors">
      <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Enter Full Name*" value="" name="editDoctorName" ng-model="editdoctor.name" ng-required="true" letters-only="letters-only"/>
                          <span class="text-danger" data-ng-show="editDoctors.submitted && editDoctors.editDoctorName.$error.required ">FullName is required</span>
                        </div>
                        <div class="form-group">
                            <div ng-class="{ 'has-error' : !isSubmit && editDoctors.editDoctorMobile.$invalid && !editDoctors.editDoctorMobile.$pristine}">
                            <label>Contact Number:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Your Contact Number *" value="" name="editDoctorMobile" ng-model="editdoctor.mobile" ng-required="true" numbers-only="numbers-only"/ minlength="10" maxlength="10">
                            <span class="text-danger" data-ng-show="editDoctors.submitted && editDoctors.editDoctorMobile.$error.required">Contact Number is required</span>
                            <p ng-show="!isSubmit && editDoctors.editDoctorMobile.$error.minlength" class="text-danger">Enter valid phone number</p>
                            </div>
                         </div>
                        <div class="form-group">
                            <div ng-class="{ 'has-error' : !isSubmit &&editDoctors.editDoctorEmail.$invalid && !editDoctors.editDoctorEmail.$pristine}">
                            <label>Email:</label>
                            <span class="text-danger">*</span>
                            <input type="email" name="editDoctorEmail" ng-model="editdoctor.email"class="form-control" placeholder="enter email" value="" ng-required="true"/>
                            <span class="text-danger" data-ng-show="editDoctors.submitted && editDoctors.editDoctorEmail.$error.required">Email is required</span>
                            <p ng-show="!isSubmit && editDoctors.editDoctorEmail.$invalid && !editDoctors.editDoctorEmail.$pristine" class="help-block">please enter valid email</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Specilization:</label>
                            <span class="text-danger">*</span>
                            <select class="form-control" ng-model="editdoctor.specialization" name="editDoctorSpecialization"
                                     ng-options="b.id as b.name for b in specialization" ng-required="true">
                                    <option value="" >-- select specialization --</option>
                                </select>
                            <span class="text-danger" data-ng-show="editDoctors.submitted && editDoctors.editDoctorSpecialization.$error.required">Specilization is required</span>
                        </div>
                        <!-- <div class="form-group">
                            <label>Hospital:</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="Your Hospital Name *" value="" name="editDoctorHospital" ng-model="editdoctor.hospital" ng-required="true" />
                            <span class="text-danger" data-ng-show="editDoctors.submitted && editDoctors.editDoctorHospital.$error.required">Hospital Name is required</span>
                        </div> -->
                      </div>
        </div>
      </form>
</div>
      <div class="modal-footer">
        <div class="row" align="center">
        <button class="btn btn-dark" data-dismiss="modal" tabindex="0" onclick="javascript:window.location.reload()"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;&nbsp;Cancel
        </button>
        <button type="button" class="btn btn-primary" ng-click="editingDoctors()" tabindex="0"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Submit</button>
        </div>
      </div>
    </div>
</div>
</div>
</div>