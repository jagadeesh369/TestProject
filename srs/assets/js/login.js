'use strict';
// 'ui.bootstrap'
var app = angular.module('app',['ui.bootstrap']);
app.directive('numbersOnly', function(){
   return {
     require: 'ngModel',
     link: function(scope, element, attrs, modelCtrl) {
       modelCtrl.$parsers.push(function (inputValue) {
           if (inputValue == undefined) return '' 
           var transformedInput = inputValue.replace(/[^0-9]/g, ''); 
           if (transformedInput!=inputValue) {
              modelCtrl.$setViewValue(transformedInput);
              modelCtrl.$render();
           }         
           return transformedInput;         
       });
     }
   };
});
app.directive('lettersOnly', function(){
   return {
     require: 'ngModel',
     link: function(scope, element, attrs, modelCtrl) {
       modelCtrl.$parsers.push(function (inputValue) {
           if (inputValue == undefined) return '' 
           var transformedInput = inputValue.replace(/[^a-zA-Z\_\- ]/g, ''); 
           if (transformedInput!=inputValue) {
              modelCtrl.$setViewValue(transformedInput);
              modelCtrl.$render();
           }         
           return transformedInput;         
       });
     }
   };
});

// Controller
app.controller('loginController',function($scope, $http, $rootScope, $timeout, $window){
    // Login
    // $scope.login = function() {

    //     $window.location.href = '/srs/index.php/login/dashboard';

    // }
    $scope.patientData =function(){

        var landingUrl = "http://" + $window.location.host + "/srs/index.php/login/patient";
        $window.location.href = landingUrl;

    }
    $scope.referralDoctors=function(){
       var landingUrl = "http://" + $window.location.host + "/srs/index.php/login/referralDoctors";
        $window.location.href = landingUrl; 
    }
    $scope.userAccounts=function(){
       var landingUrl = "http://" + $window.location.host + "/srs/index.php/login/userAccounts";
        $window.location.href = landingUrl; 
    }
    $scope.services=function(){
       var landingUrl = "http://" + $window.location.host + "/srs/index.php/login/services";
        $window.location.href = landingUrl; 
    }
    $scope.specializationView=function(){
      var landingUrl = "http://" + $window.location.host + "/srs/index.php/login/specialization";
        $window.location.href = landingUrl;  
    }
    $scope.hospitalData=function(){
       var landingUrl = "http://" + $window.location.host + "/srs/index.php/login/hospital";
        $window.location.href = landingUrl; 
    }

    $scope.getPatientsData = function() {
    	console.log("hello every one");
        $http({
            method : "GET",
            url : "/srs/index.php/login/getPatientsData"
        }).then(function(response){
            if(response.data) {
                $scope.patient = response.data.patientData;
                $scope.currentPatientPage = 1;
                $scope.patientItemsPerPage = 10;
                $scope.patientItems = $scope.patient.length;
                console.log($scope.patientItems);
            }
        },function(response) {
            console.error("Error getting patients data.");
        });
    }
    $scope.patientPageChanged= function (currentPatientPage) {
        $scope.currentPatientPage = currentPatientPage;
    };
    $scope.paginatePatient = function(value) {
        var begin, end, index;
        begin = ($scope.currentPatientPage - 1) * $scope.patientItemsPerPage;
        end = begin + $scope.patientItemsPerPage;
        index = $scope.patient.indexOf(value);
        return (begin <= index && index < end);
    };
    $scope.addingPatient = function(){
    console.log("dateofbirth..."+$scope.apdob);
    console.log("age...."+$scope.page);
    console.log("alternate....."+$scope.apacntnumber);
        if($scope.addPatient.$valid) {
        console.log("adding doctors");
        var userObject = new Object();
        userObject.name = $scope.apfname;
        userObject.mobile = $scope.apcntnumber;
        userObject.alternate_contact = $scope.apacntnumber;
        userObject.email = $scope.apemail;
        userObject.dob = $scope.pdob;
        userObject.age = $scope.page;
        userObject.gender = $scope.apgender;
        userObject.address = $scope.apaddress;
        userObject.area = $scope.aparea;
    var req = {
            method : 'POST',
            url : "/srs/index.php/login/addingPatient",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddingPatient();
                $scope.patientData();

            } else {
                
            }
        }, function() {
            console.log("failed to login");
        });
    }
    
    else {
        
        $scope.addPatient.submitted = true;
        console.log("failing in adding patient");
    }
}
$scope.clearAddingPatient=function(){
        $scope.apfname ="";
        $scope.apcntnumber ="";
        $scope.pdob ="";
        $scope.page ="";
        $scope.apemail ="";
        $scope.apgender ="";
        $scope.apaddress ="";
}
$scope.updatingPatients = function(){
        if($scope.editPatientDetails.$valid){
        var userObject = new Object();
        userObject.id = $scope.editpatient.id;
        userObject.name = $scope.editpatient.name;
        userObject.email = $scope.editpatient.email;
        userObject.mobile = $scope.editpatient.mobile; 
        userObject.gender = $scope.editpatient.gender;
        userObject.address = $scope.editpatient.address;
        userObject.area = $scope.editpatient.area;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_patient",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearUpdatingPatientData();
                $scope.patientData();
            } else {
                
            }
        }, function() {
                console.log("failed to update patients data");
        });
    }
    else{
        $scope.editPatientDetails.submitted=true;
        console.log("updating patient details");
    }

    }
    $scope.clearUpdatingPatientData=function(){
         $scope.editpatient.name ="";
         $scope.editpatient.mobile ="";
         $scope.editpatient.email ="";
         $scope.editpatient.gender ="";
         $scope.editpatient.address ="";
}
    $scope.editPatient = function(p){
        $scope.editpatient = p;

     }
     $scope.getDoctorsData = function() {
        $http({
            method : "GET",
            url : "/srs/index.php/login/getDoctors"
        }).then(function(response){
            if(response.data) {
                $scope.doctors = response.data.doctorsData;
                $scope.currentDoctorPage = 1;
                $scope.doctorItemsPerPage = 10;
                $scope.items = $scope.doctors.length;
                console.log($scope.items);
            }
        },function(response) {
            console.error("Error getting doctors data.");
        });
    }
    $scope.doctorPageChanged= function (currentDoctorPage) {
        $scope.currentDoctorPage = currentDoctorPage;
    };
    $scope.paginateDoctor = function(value) {
        var begin, end, index;
        begin = ($scope.currentDoctorPage - 1) * $scope.doctorItemsPerPage;
        end = begin + $scope.doctorItemsPerPage;
        index = $scope.doctors.indexOf(value);
        return (begin <= index && index < end);
    };
    $scope.getSpecializationData = function() {
        $http({
            method : "GET",
            url : "/srs/index.php/login/getSpecializationData"
        }).then(function(response){
            if(response.data) {
                $scope.specialization = response.data.specializationData;
                $scope.currentSpecializationPage = 1;
                $scope.specializationItemsPerPage = 10;
                $scope.specializationItems = $scope.specialization.length;

                console.log($scope.specializationItems);
            }
        },function(response) {
            console.error("Error getting specialization data.");
        });
    }
    $scope.specializationPageChanged= function (currentSpecializationPage) {
        $scope.currentSpecializationPage = currentSpecializationPage;
    };
    $scope.paginateSpecialization = function(value) {
        var begin, end, index;
        begin = ($scope.currentSpecializationPage - 1) * $scope.specializationItemsPerPage;
        end = begin + $scope.specializationItemsPerPage;
        index = $scope.specialization.indexOf(value);
        return (begin <= index && index < end);
    };
     $scope.getHospital = function() {
        $http({
            method : "GET",
            url : "/srs/index.php/login/getHospitalData"
        }).then(function(response){
            if(response.data) {
                $scope.hospital = response.data.hospitalData;
                $scope.currentHospitalPage = 1;
                $scope.hospitalItemsPerPage = 10;
                $scope.hospitalItems = $scope.hospital.length;
                console.log($scope.hospitalItems);
            } 
        },function(response) {
            console.error("Error getting hospital data.");
        });
    }
    $scope.hospitalPageChanged= function (currentHospitalPage) {
        $scope.currentHospitalPage = currentHospitalPage;
    };
    $scope.paginateHospital = function(value) {
        var begin, end, index;
        begin = ($scope.currentHospitalPage - 1) * $scope.hospitalItemsPerPage;
        end = begin + $scope.hospitalItemsPerPage;
        index = $scope.hospital.indexOf(value);
        return (begin <= index && index < end);
    };
            //method to add new  doctors details
    $scope.addingDoctors = function(){
        if($scope.addDoctor.$valid) {
        console.log("adding doctors");
        var userObject = new Object();
        userObject.name = $scope.adfname;
        userObject.mobile = $scope.adcntnumber;
        userObject.specialization = $scope.adspecilization;
        userObject.hospital = $scope.adhospital;
        userObject.email = $scope.ademail;
        
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/addingDoctor",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddingDoctor();
                $scope.referralDoctors();
            } else {
                
            }
        }, function() {
            console.log("failed to login");
        });
    }
    
    else {
        
        $scope.addDoctor.submitted = true;
        console.log("failing in adding doctors");
    }
}
$scope.clearAddingDoctor = function(){
        $scope.adfname ="";
        $scope.ademail ="";
        $scope.adcntnumber = "";
        $scope.adspecilization ="";
        $scope.adhospital ="";
        $scope.adplace ="";
        $scope.adaddress= "";
        $scope.addDoctor.submitted = false;
    }
$scope.editDoctor=function(d){
         $scope.editdoctor = d;
        console.log("hello edit the doctors records");
     }
         // method to save the edited doctors details
     $scope.editingDoctors = function(){
    if($scope.editDoctors.$valid) {
        console.log("editing doctors");
    var userObject = new Object();
        userObject.id = $scope.editdoctor.id;
        userObject.name = $scope.editdoctor.name;
        userObject.email = $scope.editdoctor.email;
        userObject.mobile = $scope.editdoctor.mobile; 
        userObject.specialization = $scope.editdoctor.specialization;
        // userObject.hospital = $scope.editdoctor.hospital;

        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_doctor",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearUpdateDoctor();
                $scope.referralDoctors();
            } else {
                
            }
        }, function() {
                console.log("failed to update doctors data");
        });
}
else {
        //if form is not valid set $scope.editDoctors.submitted to true
        $scope.editDoctors.submitted = true;
        console.log("failing in editing doctors");
    }

    }
    $scope.clearUpdateDoctor=function(){
        $scope.editdoctor.name="";
        $scope.editdoctor.mobile="";
        $scope.editdoctor.email="";
        $scope.editdoctor.specialization="";
        $scope.editdoctor.hospital="";
        $scope.editDoctors.submitted = false;
}
$scope.getRoleData = function() {
        $http({
            method : "GET",
            url : "/srs/index.php/login/getRoles"
        }).then(function(response){
            if(response.data) {
                $scope.roles = response.data.rolesData;
                console.log($scope.roles);
            }
        },function(response) {
            console.error("Error getting doctors data.");
        });
    }
    $scope.edituser= function(e){
      
        $scope.editEmployee = e;
    }
     $scope.getEmployeeData = function() {
        $http({
            method : "GET",
            url : "/srs/index.php/login/getEmployees"
        }).then(function(response){
            if(response.data) {
                $scope.employees = response.data.employeeData;
                //pagination
                $scope.currentUserPage = 1;
                $scope.itemsPerPage =10;
                $scope.totalItems = $scope.employees.length;
                    console.log($scope.totalItems);
            }
        },function(response) {
            console.error("Error getting employees data.");
        });
    }
    $scope.pageChanged = function (currentUserPage) {
        $scope.currentUserPage = currentUserPage;
        console.log($scope.currentUserPage);
    };

   $scope.paginateUser = function(value) {
        var begin, end, index;
        begin = ($scope.currentUserPage - 1) * $scope.itemsPerPage;
        end = begin + $scope.itemsPerPage;
        index = $scope.employees.indexOf(value);
        return (begin <= index && index < end);
    };
     //method to add the  new employee details
    $scope.addingUser = function(){
        if($scope.addUser.$valid) {
        var userObject = new Object();
        userObject.name = $scope.fullname;
        userObject.email = $scope.auemail;
        userObject.mobile = $scope.mobile;
        userObject.role = $scope.role;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/createUser",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddUserDetails();
                $scope.userAccounts();
            } else {
            }
        }, function() {
                console.log("failed to create");
        });
        //form is valid- so save it to DB
    }
    else {
        //if form is not valid set $scope.addRelation.submitted to true
        $scope.addUser.submit=true;
        console.log("failed");
        }
    }
    //method to save the edited employee details
    $scope.saveEmployee = function(){
        if($scope.eed.$valid){
        var userObject = new Object();
        userObject.id = $scope.editEmployee.id;
        userObject.name = $scope.editEmployee.name;
        userObject.email = $scope.editEmployee.email;
        userObject.mobile = $scope.editEmployee.mobile; 
        // userObject.role = $scope.editEmployee.role;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_employee",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearUpdatingEmployee();
                $scope.userAccounts();

            } else {
                
            }
        }, function() {
                console.log("failed to update");
        });
    }
    else{
         $scope.eed.submitted = true;
        console.log("failing in adding employess");
        
    }
    };
    $scope.clearAddUserDetails = function(){
        console.log("we are in clear add user details");
        $scope.fullname ="";
        $scope.auemail = "";
        $scope.role="";
        $scope.mobile ="";
    }
     $scope.clearUpdatingEmployee=function(){
        $scope.editEmployee.name="";
        $scope.editEmployee.email="";
        $scope.editEmployee.mobile="";
        $scope.editEmployee.role="";
        $scope.eed.submitted = false;
    }
    $scope.getServicesData = function() {
        $http({
            method : "GET",
            url : "/srs/index.php/login/getServices"
        }).then(function(response){
            if(response.data) {
                $scope.service= response.data.serviceData;
                console.log($scope.service);
            }
        },function(response) {
            console.error("Error getting employees data.");
        });
    }
    //method to show the edit service view
     $scope.editservice= function(s){
      
        $scope.editservice = s;
    }
    $scope.clearAddingParticularData=function(){
        $scope.apname="";
        $scope.apprice="";
        $scope.apcprice="";
    }
    //method to add the new service
    $scope.addingService = function(){
        if($scope.addService.$valid){
        var userObject = new Object();
        userObject.name = $scope.asname;
         var req = {
            method : 'POST',
            url : "/srs/index.php/login/addingService",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddService();
                $scope.services();

            } else {
                
            }
        }, function() {
            console.log("failed to adding");
        });
                        
        }
        else{
            $scope.addService.submitted = true;
            console.log("failed adding services");
        }
    }
    $scope.clearAddService=function(){
        $scope.asname="";
    }
     //method to save the edited service details
    $scope.saveService = function(){
    if($scope.editService.$valid){
        // console.log("we are in save service")
        // console.log($scope.editservice.id);
        // console.log($scope.editservice.name);
    var userObject = new Object();
        userObject.id = $scope.editservice.id;
        userObject.name = $scope.editservice.name;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_service",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearEditServiceData();
                $scope.services();
            } else {
                
            }
        }, function() {
                console.log("failed to update");
        });
    }
    else{
        $scope.editService.submitted = true;
        console.log("failing in editing service");
    }
};
    $scope.clearEditServiceData=function(){
        $scope.editservice.name="";
    }
    $scope.editParticular = function(p){
        $scope.editparticular = p;

     }
      //method to add the Particular 
    $scope.addingParticular = function(){
        console.log($scope.check);
        if($scope.check){
            $scope.check=1;
        }
        console.log($scope.check);
        if($scope.addParticulars.$valid){
        var userObject = new Object();
        userObject.service_id = $scope.serviceId;
        userObject.particular = $scope.apname;
        userObject.price = $scope.apprice;
        userObject.corporate_price = $scope.apcprice;
        userObject.status = $scope.check;

         var req = {
            method : 'POST',
            url : "/srs/index.php/login/addingParticular",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddingParticularData();
                $scope.services();
            } else {
                
            }
        }, function() {
            console.log("failed to adding");
            alert("please select any service");
        });
                        
        }
        else{
            $scope.addParticulars.submitted = true;
            console.log("failed adding particulars")
        }
    }
    $scope.clearAddingParticularData=function(){
        $scope.apname="";
        $scope.apprice="";
        $scope.apcprice="";
    }
         //method to save the edited Particulars Details
    $scope.updatingParticulars = function(){
        if($scope.epd.$valid) {
        var userObject = new Object();
        userObject.id = $scope.editparticular.id;
        userObject.particular = $scope.editparticular.particular;
        userObject.price = $scope.editparticular.price;
        userObject.corporate_price = $scope.editparticular.corporate_price;

        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_particular",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearUpdatingParticularData();
                $scope.services();
            } else {
                
            }
        }, function() {
                console.log("failed to update particularservice data");
        });

    }
    else {
        
        $scope.epd.submit = true;
        console.log("failing in updating Particulars");
    }
}
$scope.clearUpdatingParticularData=function(){
 $scope.editparticular.particular  ="";
 $scope.editparticular.price="";
 $scope.editparticular.corporate_price="";
}
$scope.getParticularService = function(s) {
        $scope.serviceId=s.id;
        console.log($scope.serviceId);
        var userObject = new Object();
        userObject.id = s.id;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/getParticularService",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data.particularservice);
                $scope.pservices=data.data.particularservice;
            } else {
            }
        }, function() {
                console.log("failed to get the data");
        });
    }
    $scope.editSpecialization = function(s){
        $scope.special = s;

    }
     // method for adding new specialization details
    $scope.addingSpecialization=function(){
        if($scope.addSpecialization.$valid){
            var userObject = new Object();
            userObject.name = $scope.asname;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/specializationData",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddingSpecializationData();
                $scope.specializationView();
            } else {
                
                
            }
        }, function() {
                console.log("failed to add specialization data");
        });
        //form is valid- so save it to DB
    }
        else {
        //if form is not valid set $scope.addRelation.submitted to true
        $scope.addSpecialization.submitted=true;
        console.log("failed");
    }
    }
    $scope.clearAddingSpecializationData=function(){
	$scope.addSpecialization.asname ="";
}
       //method to save the edited specialization details
    $scope.editingSpecialization = function(){
        if($scope.editSpecializationDetails.$valid){
        console.log("hello we are in updating");
         var userObject = new Object();
        userObject.id = $scope.special.id;
        userObject.name = $scope.special.name;

        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_specialization",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearEditSpecializationData();
                $scope.specializationView();
            } else {
                
            }
        }, function() {
                console.log("failed to update specialization data");
        });
}
else{
        $scope.editSpecializationDetails.submit = true;
}
}
$scope.clearEditSpecializationData=function(){
     $scope.special.name ="";
     $scope.editSpecializationDetails.submit = false;
    }
// method to show edit hospital view
     $scope.editHospital = function(h){
        $scope.edithospital = h;

     }
     //method to  add the new hospital details
     $scope.addingHospital=function(){
        if($scope.addhospital.$valid){
            var userObject = new Object();
            userObject.name = $scope.ahname;
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/hospitalData",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.clearAddHospitalData();
                $scope.hospitalData();
            } else {
                
            }
        }, function() {
                console.log("failed to add hospital data");
        });
        //form is valid- so save it to DB
    }
        else {
        //if form is not valid set $scope.addRelation.submitted to true
        $scope.addhospital.submitted=true;
        console.log("failed");
    }
    }
    $scope.clearAddHospitalData=function(){
        $scope.ahname="";
         $scope.addhospital.submitted=false;

    }
        // method to save the edited hospital details 
    $scope.editingHospital = function(){
        if($scope.editHospitalDetails.$valid){
        console.log("hello we are in updating");
         var userObject = new Object();
        userObject.id = $scope.edithospital.id;
        userObject.name = $scope.edithospital.name;

        var req = {
            method : 'POST',
            url : "/srs/index.php/login/update_hospital",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::"+data.data);
                $scope.clearEditHospitalData();
                $scope.hospitalData();
            } else {
             console.log("failing in update_hospital");   
            }
        }, function() {
                console.log("failed to update hospital data");
        });


    }
    else{

        $scope.editHospitalDetails.submitted=true;
    }
}
    $scope.clearEditHospitalData=function(){
        $scope.edithospital.name="";
        $scope.editHospitalDetails.submitted=false;
    }
    $scope.login= function () {
    	console.log($scope.userEmail);
    	console.log($scope.userPassword);
    	console.log($scope.userType);
    if ($scope.user.$valid) {
        var userObject = new Object();
        userObject.userId = $scope.userEmail;
        userObject.password = $scope.userPassword;
        userObject.type=$scope.userType;
        console.log("hello every one");
        var req = {
            method : 'POST',
            url : "/srs/index.php/login/logging",
            headers : {
                'Content-Type' : 'application/json'
            },
            dataType:'json',
            data: userObject
        }
        $http(req).then(function(data) {
            if(data.data) {
                console.log("Data::::"+data.data);
                $scope.result = data.data;
                if(data.data == "true"){
                    $window.location.href = '/srs/index.php/login/dashboard';
                    //  $scope.DashBoard();
                    // console.log("dashboard");
                }
                else{
                    alert("please enter valid login details");
                }

            $scope.clearLoginDetails();
            } else {
            }
        }, function() {
                console.log("failed to login");
        console.log("data is valid");
        // });
    });
}
    else {
        //if form is not valid set $scope.addRelation.submitted to true
        $scope.user.submitted=true;
        console.log("failed while login");
    }
};
$scope.checkingService=function(){
    if($scope.serviceId){
        $("#myModal123").modal('show');
        console.log("hello");     
}
    else{
        alert("please select service");
        $("#myModal123").modal('hide');
    }
}
});
