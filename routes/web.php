<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/template2', function () {
    return view('template.dashboard.layoutsbk');
});

//our email address: jamesmoha@gmail.com
//Your password: qZhwrk98

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('DomainLogin',['as'=>'Domain.Login','uses'=>'Account\AccountDomainController@domainselect']);

Route::get('ConfirmLogin',['as'=>'Confirm.Login','uses'=>'Account\AccountDomainController@ConfirmLogin']);

Route::get('ForgotPassword',['as'=>'Confirm.ForgotPassword','uses'=>'Account\AccountDomainController@ForgotPassword']);


Route::post('DomainLoginStore',['as'=>'Domainstore.Login','uses'=>'Account\AccountDomainController@domainselectStore']);
Route::get('FirstRegister',['as'=>'First.Register','uses'=>'Account\AccountDomainController@FirstRegister']);
Route::get('EmailConfirm/{email}/{url}/First',['as'=>'First.EmailConfirm','uses'=>'Account\AccountDomainController@EmailConfirm']);
Route::get('RegisterClient/store',['as'=>'RegisterClient.store','uses'=>'Account\AccountDomainController@RegisterClientstore']);



Route::group(['middleware' => ['auth']], function() {


        Route::get('/accessrightserror', function () {
           return view('errors/accesscontrolerror');
        });
        Route::get('/home', 'HomeController@index');
        Route::get('/employeedashboard', 'HomeController@employeedashboard');
        Route::get('/dashboard', 'DashboardController@index');
        Route::get('Applications/show',['as'=>'Applications.show','uses'=>'DashboardController@Applicationshow']);

       Route::get('Coming/index',['as'=>'Coming.index','uses'=>'HomeController@ComingIndex']);

        Route::get('Administrative/Settings',['as'=>'Administrative.Settings','uses'=>'DashboardController@AdministrativeSettings']);

        
         Route::get('Tenant/dashboard',['as'=>'Tenant.dashboard','uses'=>'Sadmin\MaintenanceController@dashboard']);  
         Route::get('Tenant/index',['as'=>'Tenant.index','uses'=>'Sadmin\MaintenanceController@tenant']);
         Route::get('Tenant/{id}/edit',['as'=>'Tenant.edit','uses'=>'Sadmin\MaintenanceController@edit']);
         
         Route::get('Tenant/{id}/disableaccount',['as'=>'Tenant.disableaccount','uses'=>'Sadmin\MaintenanceController@disableaccount']);
         Route::patch('Tenantdisableupdate/{id}',['as'=>'Tenantdisable.update','uses'=>'Sadmin\MaintenanceController@tenantdisableupdate']);
         
         
         Route::get('Tenant/create',['as'=>'Tenant.create','uses'=>'Sadmin\MaintenanceController@create']);
         Route::patch('Tenant/{id}',['as'=>'Tenant.update','uses'=>'Sadmin\MaintenanceController@update']);
         Route::delete('Tenant/{id}',['as'=>'Tenant.destroy','uses'=>'Sadmin\MaintenanceController@destroy']);
         Route::get('Tenantusers/index',['as'=>'Tenantusers.index','uses'=>'Sadmin\MaintenanceController@tenantusers']); 
         
         Route::get('Tenantsales/index',['as'=>'Tenant.sales','uses'=>'Sadmin\MaintenanceController@tenantsales']); 
         
         Route::get('Tenantpayroll/index',['as'=>'Tenant.payroll','uses'=>'Sadmin\MaintenanceController@tenantpayroll']); 
          
          Route::get('ViewTenantProcess/{tenant}/{id}/view',['as'=>'Tenant.payrollViewTenantProcess','uses'=>'Sadmin\MaintenanceController@tenantpayrollview']); 
          
         
         Route::get('PayrollProcessing.index',['as'=>'PayrollProcessing.index','uses'=>'Sadmin\MaintenanceController@PayrollProcessing']);


         Route::get('AppModules/index',['as'=>'AppModules.index','uses'=>'Sadmin\AppModules@index']);
         
         Route::post('Tenant/ProcesspayrollView',['as'=>'Tenant.ProcesspayrollViewStore','uses'=>'Sadmin\MaintenanceController@ProcesspayrollViewStore']); 




        Route::get('Admin/JobSettings',['as'=>'Admin.JobSettings','uses'=>'DashboardController@adminjobSettings']);

        Route::get('Admin/QualificationSettings',['as'=>'Admin.qualificationssettings','uses'=>'DashboardController@qualificationssettings']);

        Route::get('Admin/PayrollSettings',['as'=>'Admin.payrollsettings','uses'=>'DashboardController@payrollsettings']);

        Route::get('Recruitment/decision',['as'=>'Recruitment.decision','uses'=>'DashboardController@Recruitmentdecision']);




        Route::get('Users/index', ['as'=>'users.index','uses'=>'UserController@index']);
	Route::get('Users/create',['as'=>'users.create','uses'=>'UserController@create']);
        Route::post('Users/store',['as'=>'users.store','uses'=>'UserController@store']);
        Route::get('Users/show/{id}',['as'=>'users.show','uses'=>'UserController@show']);
        Route::get('Users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit']);
        Route::get('Users/{id}/disable',['as'=>'users.disable','uses'=>'UserController@disable']);
	
        Route::patch('Users/{id}',['as'=>'users.update','uses'=>'UserController@update']);
	Route::delete('Users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy']);






        Route::get('Roles/index', ['as'=>'roles.index','uses'=>'RoleController@index']);
	Route::get('Roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
        Route::post('Roles/store',['as'=>'roles.store','uses'=>'RoleController@store']);
        Route::get('Roles/show/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
        Route::get('Roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
	Route::patch('Roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
	Route::delete('Roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);




        Route::get('Permission/index',  [ 'as'=>'permission.index','uses'=>'PermissionController@index']);
        Route::get('Permission/create',   [ 'as'=>'permission.create','uses'=>'PermissionController@create']);
        Route::get('Permission/edit/{id}', [ 'as'=>'permission.edit','uses'=>'PermissionController@edit']);
        Route::post('Permission/store',    [ 'as'=>'permission.store','uses'=>'PermissionController@store']);
        Route::post('Permission/update',    [ 'as'=>'permission.update','uses'=>'PermissionController@update']);
        Route::get('Permission/{id}/show',['as'=>'permission.show','uses'=>'PermissionController@show']);


        Route::get('Locations/index',['as'=>'Locations.index','uses'=>'Admin\LocationsController@index']);
        Route::get('Locations/data',['as'=>'Locations.locationData','uses'=>'Admin\LocationsController@locationData']);
        Route::get('Locations/create',['as'=>'Locations.create','uses'=>'Admin\LocationsController@create']);
        Route::post('Locations/store',['as'=>'Locations.store','uses'=>'Admin\LocationsController@store']);
        Route::get('Locations/{id}/edit',['as'=>'Locations.edit','uses'=>'Admin\LocationsController@edit']);
        Route::delete('Locations/{id}',['as'=>'Locations.destroy','uses'=>'Admin\LocationsController@destroy']);
        Route::patch('Locations/{id}',['as'=>'Locations.update','uses'=>'Admin\LocationsController@update']);



        Route::get('Employee/{id}/decision',['as'=>'Employee.decision','uses'=>'Pim\EmployeeController@decision']);
        Route::get('Employee/index',['as'=>'Employee.index','uses'=>'Pim\EmployeeController@index']);
        Route::get('Employee/create',['as'=>'Employee.create','uses'=>'Pim\EmployeeController@create']);
        Route::get('Employee/account',['as'=>'Employee.account','uses'=>'Pim\EmployeeController@account']);
        Route::post('EmployeeAccount/store',['as'=>'EmployeeAccount.store','uses'=>'Pim\EmployeeController@accountstore']); 
         
        
        Route::post('Employee/compensationstore',['as'=>'Employee.compensationstore','uses'=>'Pim\EmployeeController@compensationstore']);


        Route::post('Employee/store',['as'=>'Employee.store','uses'=>'Pim\EmployeeController@store']);
        Route::post('Employee/bankinfostore',['as'=>'Employee.bankinfostore','uses'=>'Pim\EmployeeController@bankinfostore']);
        Route::post('Employee/bankinfostore2',['as'=>'Employee.bankinfostore2','uses'=>'Pim\EmployeeController@bankinfostore2']);



        Route::post('Employee/photostore',['as'=>'Employee.photostore','uses'=>'Pim\EmployeeController@photostore']);


        Route::post('Employee/decisionstore',['as'=>'Employee.decisionstore','uses'=>'Pim\EmployeeController@decisionstore']);
        Route::get('Employee/{id}/edit',['as'=>'Employee.edit','uses'=>'Pim\EmployeeController@edit']);

      Route::get('Employee/{id}/editphoto',['as'=>'Employee.editphoto','uses'=>'Pim\EmployeeController@editphoto', /*'middleware' => ['permission:role-edit']*/]);


        Route::get('EmploymentCompensationedit/{id}/edit',['as'=>'EmploymentCompensation.edit','uses'=>'Pim\EmployeeController@EmploymentCompensationedit2', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('EditBankInformation/{id}/edit',['as'=>'EditBankInformation.edit','uses'=>'Pim\EmployeeController@EditBankInformation', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('Employee/{id}/show',['as'=>'Employee.show','uses'=>'Pim\EmployeeController@show', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('Employee/{id}',['as'=>'Employee.destroy','uses'=>'Pim\EmployeeController@destroy'/*'middleware' => ['permission:role-delete']*/]);

        Route::patch('Employee/{id}',['as'=>'Employee.update','uses'=>'Pim\EmployeeController@update'/*,'middleware' => ['permission:role-edit']*/]);






        Route::get('editbankdetails/{id}',['as'=>'Employee.editbankdetails','uses'=>'Pim\EmployeeController@editbankdetails', /*'middleware' => ['permission:role-edit']*/]);
        Route::get('addbankdetails/{id}',['as'=>'Employee.addbankdetails','uses'=>'Pim\EmployeeController@addbankdetails', /*'middleware' => ['permission:role-edit']*/]);


        Route::patch('editbankinfoUpdate/{id}',['as'=>'editbankinfoUpdate.update','uses'=>'Pim\EmployeeController@editbankinfoUpdate', /*'middleware' => ['permission:role-edit']*/]);


        Route::patch('editemplcompensationupdate/{id}',['as'=>'editemplcompensation.update','uses'=>'Pim\EmployeeController@editemplcompensationupdate', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('EmployeeEducationWorkExperience/{id}/show',['as'=>'EmployeeEducationWorkExperience.show','uses'=>'Pim\EmployeeController@EmployeeEducationWorkExperience', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('EmployeeDocuments/{id}/show',['as'=>'EmployeeDocuments.show','uses'=>'Pim\EmployeeController@EmployeeDocuments', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('AccountInformation/{id}/show',['as'=>'AccountInformation.show','uses'=>'Pim\EmployeeController@AccountInformation', /*'middleware' => ['permission:role-edit']*/]);


        Route::get('editemployeeterminationstate/{id}/edit',['as'=>'editemployeeterminationstate.edit','uses'=>'Pim\EmployeeController@editemployeeterminationstate', /*'middleware' => ['permission:role-edit']*/]);
        Route::post('editemployeeterminationstate/store',['as'=>'editemployeeterminationstate.store','uses'=>'Pim\EmployeeController@editemployeeterminationstatestore', /*'middleware' => ['permission:role-edit']*/]);




        Route::get('Employee/{id}/EmploymentCompensation',['as'=>'EmploymentCompensation.create','uses'=>'Pim\EmployeeController@EmploymentCompensationcreate']);


        Route::get('Employee/{id}/BankInformation',['as'=>'BankInformation.create','uses'=>'Pim\EmployeeController@EmployeeBankInformation']);

         Route::get('editemplcompensation/{id}',['as'=>'editemplcompensation.edit','uses'=>'Pim\EmployeeController@editemplcompensation']);














        Route::get('EmploymentCompensation/{id}/show',['as'=>'EmploymentCompensation.show','uses'=>'Pim\EmploymentCompenstationController@show', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('EmployeeTaxInfo/{id}/show',['as'=>'EmployeeTaxInfo.show','uses'=>'Pim\EmployeeController@employeeTaxInfo', /*'middleware' => ['permission:role-edit']*/]);
        Route::get('EmployeeBankInformation/{id}/show',['as'=>'EmployeeBankInformation.show','uses'=>'Pim\EmployeeController@EmployeeBankInformationedit', /*'middleware' => ['permission:role-edit']*/]);
        Route::any('updateemployeeJobtitle','Api\EmployeeAjaxController@updateemployeeJobtitle');
        Route::post('updateemployeeProfPhoto','Api\EmployeeAjaxController@updateemployeeProfPhoto');

        Route::get('EmployeeTaxInfo/{id}/edit',['as'=>'EmployeeTaxInfo.edit','uses'=>'Pim\EmployeeTaxInfoController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::patch('EmployeeTaxInfo/{id}',['as'=>'EmployeeTaxInfo.update','uses'=>'Pim\EmployeeTaxInfoController@update'/*,'middleware' => ['permission:role-edit']*/]);



        Route::get('SocialMediaDetails/index',['as'=>'SocialMediaDetails.index','uses'=>'Pim\SocialMediaController@index']);
        Route::get('SocialMediaDetails/{id}/create',['as'=>'SocialMediaDetails.create','uses'=>'Pim\SocialMediaController@create']);
        Route::post('SocialMediaDetails/store',['as'=>'SocialMediaDetails.store','uses'=>'Pim\SocialMediaController@store']);
        Route::get('SocialMediaDetails/{id}/edit',['as'=>'SocialMediaDetails.edit','uses'=>'Pim\SocialMediaController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('SocialMediaDetails/{id}',['as'=>'SocialMediaDetails.destroy','uses'=>'Pim\SocialMediaController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('SocialMediaDetails/{id}',['as'=>'SocialMediaDetails.update','uses'=>'Pim\SocialMediaController@update'/*,'middleware' => ['permission:role-edit']*/]);



        Route::get('ContactDetails/index',['as'=>'ContactDetails.index','uses'=>'Pim\ContactDetailsController@index']);
        Route::get('ContactDetails/{id}/create',['as'=>'ContactDetails.create','uses'=>'Pim\ContactDetailsController@create']);
        Route::post('ContactDetails/store',['as'=>'ContactDetails.store','uses'=>'Pim\ContactDetailsController@store']);
        Route::get('ContactDetails/{id}/edit',['as'=>'ContactDetails.edit','uses'=>'Pim\ContactDetailsController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('ContactDetails/{id}',['as'=>'ContactDetails.destroy','uses'=>'Pim\ContactDetailsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('ContactDetails/{id}',['as'=>'ContactDetails.update','uses'=>'Pim\ContactDetailsController@update'/*,'middleware' => ['permission:role-edit']*/]);

        Route::get('EmpLanguage/index',['as'=>'EmpLanguage.index','uses'=>'Pim\EmpLanguageController@index']);
        Route::get('EmpLanguage/{id}/create',['as'=>'EmpLanguage.create','uses'=>'Pim\EmpLanguageController@create']);
        Route::post('EmpLanguage/store',['as'=>'EmpLanguage.store','uses'=>'Pim\EmpLanguageController@store']);
        Route::get('EmpLanguage/{id}/edit',['as'=>'EmpLanguage.edit','uses'=>'Pim\EmpLanguageController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('EmpLanguage/{id}',['as'=>'EmpLanguage.destroy','uses'=>'Pim\EmpLanguageController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('EmpLanguage/{id}',['as'=>'EmpLanguage.update','uses'=>'Pim\EmpLanguageController@update'/*,'middleware' => ['permission:role-edit']*/]);




        Route::get('EmergencyContacts/{id}/index',['as'=>'EmergencyContacts.index','uses'=>'Pim\EmergencyContactController@index']);
        Route::get('EmergencyContacts/{id}/create',['as'=>'EmergencyContacts.create','uses'=>'Pim\EmergencyContactController@create']);
        Route::post('EmergencyContacts/store',['as'=>'EmergencyContacts.store','uses'=>'Pim\EmergencyContactController@store']);
        Route::get('EmergencyContacts/{id}/edit',['as'=>'EmergencyContacts.edit','uses'=>'Pim\EmergencyContactController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('EmergencyContacts/{id}',['as'=>'EmergencyContacts.destroy','uses'=>'Pim\EmergencyContactController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('EmergencyContacts/{id}',['as'=>'EmergencyContacts.update','uses'=>'Pim\EmergencyContactController@update'/*,'middleware' => ['permission:role-edit']*/]);


        Route::get('Holidays/index',['as'=>'Holidays.index','uses'=>'Leave\HolidaysController@index']);
        Route::get('Holidays/{id}/create',['as'=>'Holidays.create','uses'=>'Leave\HolidaysController@create']);
        Route::post('Holidays/store',['as'=>'Holidays.store','uses'=>'Leave\HolidaysController@store']);
        Route::get('Holidays/{id}/edit',['as'=>'Holidays.edit','uses'=>'Leave\HolidaysController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('Holidays/{id}',['as'=>'Holidays.destroy','uses'=>'Leave\HolidaysController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('Holidays/{id}',['as'=>'Holidays.update','uses'=>'Leave\HolidaysController@update'/*,'middleware' => ['permission:role-edit']*/]);


        Route::get('LeaveType/index',['as'=>'LeaveType.index','uses'=>'Leave\LeaveTypeController@index']);
        Route::get('LeaveType/Policyindex',['as'=>'LeaveType.Policyindex','uses'=>'Leave\LeaveTypeController@Policyindex']);
        Route::get('LeaveType/create',['as'=>'LeaveType.create','uses'=>'Leave\LeaveTypeController@create']);
        Route::post('LeaveType/store',['as'=>'LeaveType.store','uses'=>'Leave\LeaveTypeController@store']);

        Route::get('LeaveTypePolicy/create',['as'=>'LeaveTypePolicy.create','uses'=>'Leave\LeaveTypeController@createleavepolicy', /*'middleware' => ['permission:role-edit']*/]);

        Route::get('LeaveTypePolicy/{id}/edit',['as'=>'LeaveTypePolicy.edit','uses'=>'Leave\LeaveTypeController@editleavepolicy', /*'middleware' => ['permission:role-edit']*/]);

        Route::delete('LeaveTypePolicy/{id}',['as'=>'LeaveTypePolicy.destroy','uses'=>'Leave\LeaveTypeController@deleteleavepolicy'/*'middleware' => ['permission:role-delete']*/]);

        Route::post('SetupPolicy/store',['as'=>'SetupPolicy.store','uses'=>'Leave\LeaveTypeController@SetupPolicystore']);

        Route::get('LeavePolicy/{id}/edit',['as'=>'LeavePolicy.edit','uses'=>'Leave\LeaveTypeController@editleavepolicy', /*'middleware' => ['permission:role-edit']*/]);

        Route::patch('SetupPolicy/{id}',['as'=>'SetupPolicy.update','uses'=>'Leave\LeaveTypeController@updateleavepolicy'/*,'middleware' => ['permission:role-edit']*/]);

        Route::get('LeaveType/{id}/edit',['as'=>'LeaveType.edit','uses'=>'Leave\LeaveTypeController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::get('LeaveType/{id}/policyadd',['as'=>'LeaveType.policyadd','uses'=>'Leave\LeaveTypeController@policyadd', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('LeaveType/{id}',['as'=>'LeaveType.destroy','uses'=>'Leave\LeaveTypeController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('LeaveType/{id}',['as'=>'LeaveType.update','uses'=>'Leave\LeaveTypeController@update'/*,'middleware' => ['permission:role-edit']*/]);


        Route::get('AssignLeave/{id}/index',['as'=>'AssignLeave.index','uses'=>'Leave\AssignLeaveController@index']);
        Route::get('LeaveCalendar/index',['as'=>'AssignLeave.LeaveCalendar','uses'=>'Leave\AssignLeaveController@LeaveCalendar']);
        Route::get('AssignLeave/create',['as'=>'AssignLeave.create','uses'=>'Leave\AssignLeaveController@create']);
        
        
        Route::get('AssignLeave/Approvals',['as'=>'Assignleave.Approvals','uses'=>'Leave\AssignLeaveController@Approvals']);
        
         Route::get('AssignLeave/{id}/ApproveNow',['as'=>'AssignLeave.ApproveNow','uses'=>'Leave\AssignLeaveController@ApproveNow']);
         
         Route::post('AssignleaveApprovals/store',['as'=>'AssignleaveApprovals.store','uses'=>'Leave\AssignLeaveController@AssignleaveApprovalsstore']);
        
        
        
        Route::get('AssignLeave/{id}/request',['as'=>'AssignLeave.request','uses'=>'Leave\AssignLeaveController@request']);
        Route::get('AssignLeave/{id}/leaverequestcreate',['as'=>'AssignLeave.leaverequestcreate','uses'=>'Leave\AssignLeaveController@leaverequestcreate']);
        Route::post('AssignLeave/store',['as'=>'AssignLeave.store','uses'=>'Leave\AssignLeaveController@store']);
        Route::get('AssignLeave/decision',['as'=>'Leave.decision','uses'=>'Leave\AssignLeaveController@decision'/*,'middleware' => ['permission:role-edit']*/]);
        Route::get('AssignLeave/{id}/edit',['as'=>'AssignLeave.edit','uses'=>'Leave\AssignLeaveController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('AssignLeave/{id}',['as'=>'AssignLeave.destroy','uses'=>'Leave\AssignLeaveController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('AssignLeave/{id}',['as'=>'AssignLeave.update','uses'=>'Leave\AssignLeaveController@update'/*,'middleware' => ['permission:role-edit']*/]);




        Route::get('Documents/index',['as'=>'Documents.index','uses'=>'Admin\DocumentsController@index']);
        Route::get('Documents/Categorycreate',['as'=>'Documents.Categorycreate','uses'=>'Admin\DocumentsController@Categorycreate']);
        Route::get('Documents/create',['as'=>'Documents.create','uses'=>'Admin\DocumentsController@create']);
        Route::get('Documents/{id}/employeedocuments',['as'=>'Documents.employeedocuments','uses'=>'Admin\DocumentsController@employeedocuments']);

        Route::get('Documents/{id}/getFiles',['as'=>'Documents.getFiles','uses'=>'Admin\DocumentsController@getFiles']);
       
        Route::get('EmpDocuments/{id}/view',['as'=>'EmpDocuments.view','uses'=>'Admin\DocumentsController@empview']);

        Route::post('Documents/store',['as'=>'Documents.store','uses'=>'Admin\DocumentsController@store']);
        Route::post('Documents/categorystore',['as'=>'Documents.categorystore','uses'=>'Admin\DocumentsController@categorystore']);
        Route::get('Documents/decision',['as'=>'Documents.decision','uses'=>'Admin\DocumentsController@decision']);
        Route::get('Documents/{id}/edit',['as'=>'Documents.edit','uses'=>'Admin\DocumentsController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('Documents/{id}',['as'=>'Documents.destroy','uses'=>'Admin\DocumentsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('Documents/{id}',['as'=>'Documents.update','uses'=>'Admin\DocumentsController@update'/*,'middleware' => ['permission:role-edit']*/]);




        Route::get('Company/Profile',['as'=>'Company.Profile','uses'=>'Admin\CompanySettingsController@index']);
        Route::get('Company/TaxInfo',['as'=>'Company.TaxInfo','uses'=>'Admin\CompanySettingsController@taxinfo']);
        Route::get('Company/BillingPayments',['as'=>'Company.BillingPayments','uses'=>'Admin\CompanySettingsController@BillingPayments']);
        Route::get('Company/Addresses',['as'=>'Company.Addresses','uses'=>'Admin\CompanySettingsController@Addresses']);




        Route::post('CompanySettings/store',['as'=>'CompanySettings.store','uses'=>'Admin\CompanySettingsController@store']);
        Route::post('CompanySettings/store2',['as'=>'CompanySettings.store2','uses'=>'Admin\CompanySettingsController@store2']);
        Route::post('CompanySettings/storelogo',['as'=>'CompanySettings.storelogo','uses'=>'Admin\CompanySettingsController@storelogo']);
        Route::post('CompanySettings/taxstore',['as'=>'CompanySettings.taxstore','uses'=>'Admin\CompanySettingsController@taxstore']);
        Route::get('Documents/decision',['as'=>'Documents.decision','uses'=>'Admin\DocumentsController@decision']);
        Route::get('Documents/{id}/edit',['as'=>'Documents.edit','uses'=>'Admin\DocumentsController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('Documents/{id}',['as'=>'Documents.destroy','uses'=>'Admin\DocumentsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('Documents/{id}',['as'=>'Documents.update','uses'=>'Admin\DocumentsController@update'/*,'middleware' => ['permission:role-edit']*/]);





    Route::get('JobTitle/index',['as'=>'JobTitle.index','uses'=>'Admin\JobTitleController@index']);
    Route::get('JobTitle/create',['as'=>'JobTitle.create','uses'=>'Admin\JobTitleController@create']);
    Route::post('JobTitle/store',['as'=>'JobTitle.store','uses'=>'Admin\JobTitleController@store']);
    Route::get('JobTitle/{id}/edit',['as'=>'JobTitle.edit','uses'=>'Admin\JobTitleController@edit', /*'middleware' => ['permission:role-edit']*/]);
    Route::delete('JobTitle/{id}',['as'=>'JobTitle.destroy','uses'=>'Admin\JobTitleController@destroy'/*'middleware' => ['permission:role-delete']*/]);
    Route::patch('JobTitle/{id}',['as'=>'JobTitle.update','uses'=>'Admin\JobTitleController@update'/*,'middleware' => ['permission:role-edit']*/]);



    Route::get('BankDetails/index',['as'=>'BankDetails.index','uses'=>'Admin\BankController@index']);
    Route::get('BankDetails/create',['as'=>'BankDetails.create','uses'=>'Admin\BankController@create']);
    Route::post('BankDetails/store',['as'=>'BankDetails.store','uses'=>'Admin\BankController@store']);
    Route::get('BankDetails/{id}/edit',['as'=>'BankDetails.edit','uses'=>'Admin\BankController@edit', /*'middleware' => ['permission:role-edit']*/]);
    Route::delete('BankDetails/{id}',['as'=>'BankDetails.destroy','uses'=>'Admin\BankController@destroy'/*'middleware' => ['permission:role-delete']*/]);
    Route::patch('BankDetails/{id}',['as'=>'BankDetails.update','uses'=>'Admin\BankController@update'/*,'middleware' => ['permission:role-edit']*/]);


            Route::get('JobCategory/index',['as'=>'JobCategory.index','uses'=>'Admin\JobCategoryController@index']);
        Route::get('JobCategory/create',['as'=>'JobCategory.create','uses'=>'Admin\JobCategoryController@create']);
        Route::post('JobCategory/store',['as'=>'JobCategory.store','uses'=>'Admin\JobCategoryController@store']);
        Route::get('JobCategory/{id}/edit',['as'=>'JobCategory.edit','uses'=>'Admin\JobCategoryController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('JobCategory/{id}',['as'=>'JobCategory.destroy','uses'=>'Admin\JobCategoryController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('JobCategory/{id}',['as'=>'JobCategory.update','uses'=>'Admin\JobCategoryController@update'/*,'middleware' => ['permission:role-edit']*/]);





        Route::get('PayGrade/index',['as'=>'PayGrade.index','uses'=>'Admin\PayGradeController@index']);
        Route::get('PayGrade/create',['as'=>'PayGrade.create','uses'=>'Admin\PayGradeController@create']);
        Route::post('PayGrade/store',['as'=>'PayGrade.store','uses'=>'Admin\PayGradeController@store']);
        Route::get('PayGrade/{id}/edit',['as'=>'PayGrade.edit','uses'=>'Admin\PayGradeController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('PayGrade/{id}',['as'=>'PayGrade.destroy','uses'=>'Admin\PayGradeController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('PayGrade/{id}',['as'=>'PayGrade.update','uses'=>'Admin\PayGradeController@update'/*,'middleware' => ['permission:role-edit']*/]);



        Route::get('EmploymentStatus/index',['as'=>'EmploymentStatus.index','uses'=>'Admin\EmploymentStatusController@index']);
        Route::get('EmploymentStatus/create',['as'=>'EmploymentStatus.create','uses'=>'Admin\EmploymentStatusController@create']);
        Route::post('EmploymentStatus/store',['as'=>'EmploymentStatus.store','uses'=>'Admin\EmploymentStatusController@store']);
        Route::get('EmploymentStatus/{id}/edit',['as'=>'EmploymentStatus.edit','uses'=>'Admin\EmploymentStatusController@edit', /*'middleware' => ['permission:role-edit']*/]);
        Route::delete('EmploymentStatus/{id}',['as'=>'EmploymentStatus.destroy','uses'=>'Admin\EmploymentStatusController@destroy'/*'middleware' => ['permission:role-delete']*/]);
        Route::patch('EmploymentStatus/{id}',['as'=>'EmploymentStatus.update','uses'=>'Admin\EmploymentStatusController@update'/*,'middleware' => ['permission:role-edit']*/]);



        Route::get('WorkShift/index',['as'=>'WorkShift.index','uses'=>'Admin\WorkShiftController@index']);
Route::get('WorkShift/create',['as'=>'WorkShift.create','uses'=>'Admin\WorkShiftController@create']);
Route::post('WorkShift/store',['as'=>'WorkShift.store','uses'=>'Admin\WorkShiftController@store']);
Route::get('WorkShift/{id}/edit',['as'=>'WorkShift.edit','uses'=>'Admin\WorkShiftController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('WorkShift/{id}',['as'=>'WorkShift.destroy','uses'=>'Admin\WorkShiftController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('WorkShift/{id}',['as'=>'WorkShift.update','uses'=>'Admin\WorkShiftController@update'/*,'middleware' => ['permission:role-edit']*/]);





Route::get('EmployeeReporting/index',['as'=>'EmployeeReporting.index','uses'=>'Pim\EmployeeReportingController@index']);
Route::get('EmployeeReporting/create',['as'=>'EmployeeReporting.create','uses'=>'Pim\EmployeeReportingController@create']);
Route::post('EmployeeReporting/store',['as'=>'EmployeeReporting.store','uses'=>'Pim\EmployeeReportingController@store']);
Route::post('EmployeeReportingTo/store',['as'=>'EmployeeReportingTo.store','uses'=>'Pim\EmployeeReportingController@EmployeeReportingTostore']);
Route::patch('EmployeeReportingTo/{id}',['as'=>'EmployeeReportingTo.update','uses'=>'Pim\EmployeeReportingController@EmployeeReportingToupdate'/*,'middleware' => ['permission:role-edit']*/]);
Route::get('EmployeeReporting/{id}/edit',['as'=>'EmployeeReporting.edit','uses'=>'Pim\EmployeeReportingController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('EmployeeReporting/{id}',['as'=>'EmployeeReporting.destroy','uses'=>'Pim\EmployeeReportingController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('EmployeeReporting/{id}',['as'=>'EmployeeReporting.update','uses'=>'Pim\EmployeeReportingController@update'/*,'middleware' => ['permission:role-edit']*/]);





Route::get('Skill/index',['as'=>'Skill.index','uses'=>'Admin\SkillsController@index']);
Route::get('Skill/create',['as'=>'Skill.create','uses'=>'Admin\SkillsController@create']);
Route::post('Skill/store',['as'=>'Skill.store','uses'=>'Admin\SkillsController@store']);
Route::get('Skill/{id}/edit',['as'=>'Skill.edit','uses'=>'Admin\SkillsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Skill/{id}',['as'=>'Skill.destroy','uses'=>'Admin\SkillsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Skill/{id}',['as'=>'Skill.update','uses'=>'Admin\SkillsController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('Education/index',['as'=>'Education.index','uses'=>'Admin\EducationController@index']);
Route::get('Education/create',['as'=>'Education.create','uses'=>'Admin\EducationController@create']);
Route::post('Education/store',['as'=>'Education.store','uses'=>'Admin\EducationController@store']);
Route::get('Education/{id}/edit',['as'=>'Education.edit','uses'=>'Admin\EducationController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Education/{id}',['as'=>'Education.destroy','uses'=>'Admin\EducationController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Education/{id}',['as'=>'Education.update','uses'=>'Admin\EducationController@update'/*,'middleware' => ['permission:role-edit']*/]);





Route::get('License/index',['as'=>'License.index','uses'=>'Admin\LicenseController@index']);
Route::get('License/create',['as'=>'License.create','uses'=>'Admin\LicenseController@create']);
Route::post('License/store',['as'=>'License.store','uses'=>'Admin\LicenseController@store']);
Route::get('License/{id}/edit',['as'=>'License.edit','uses'=>'Admin\LicenseController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('License/{id}',['as'=>'License.destroy','uses'=>'Admin\LicenseController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('License/{id}',['as'=>'License.update','uses'=>'Admin\LicenseController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('Language/index',['as'=>'Language.index','uses'=>'Admin\LanguagesController@index']);
Route::get('Language/create',['as'=>'Language.create','uses'=>'Admin\LanguagesController@create']);
Route::post('Language/store',['as'=>'Language.store','uses'=>'Admin\LanguagesController@store']);
Route::get('Language/{id}/edit',['as'=>'Language.edit','uses'=>'Admin\LanguagesController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Language/{id}',['as'=>'Language.destroy','uses'=>'Admin\LanguagesController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Language/{id}',['as'=>'Language.update','uses'=>'Admin\LanguagesController@update'/*,'middleware' => ['permission:role-edit']*/]);




Route::get('Membership/index',['as'=>'Membership.index','uses'=>'Admin\MembershipController@index']);
Route::get('Membership/create',['as'=>'Membership.create','uses'=>'Admin\MembershipController@create']);
Route::post('Membership/store',['as'=>'Membership.store','uses'=>'Admin\MembershipController@store']);
Route::get('Membership/{id}/edit',['as'=>'Membership.edit','uses'=>'Admin\MembershipController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Membership/{id}',['as'=>'Membership.destroy','uses'=>'Admin\MembershipController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Membership/{id}',['as'=>'Membership.update','uses'=>'Admin\MembershipController@update'/*,'middleware' => ['permission:role-edit']*/]);





Route::get('Nationality/index',['as'=>'Nationality.index','uses'=>'Admin\NationalityController@index']);
Route::get('Nationality/create',['as'=>'Nationality.create','uses'=>'Admin\NationalityController@create']);
Route::post('Nationality/store',['as'=>'Nationality.store','uses'=>'Admin\NationalityController@store']);
Route::get('Nationality/{id}/edit',['as'=>'Nationality.edit','uses'=>'Admin\NationalityController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Nationality/{id}',['as'=>'Nationality.destroy','uses'=>'Admin\NationalityController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Nationality/{id}',['as'=>'Nationality.update','uses'=>'Admin\NationalityController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('Competency/index',['as'=>'Competency.index','uses'=>'Admin\CompetencyController@index']);
Route::get('Competency/create',['as'=>'Competency.create','uses'=>'Admin\CompetencyController@create']);
Route::post('Competency/store',['as'=>'Competency.store','uses'=>'Admin\CompetencyController@store']);
Route::get('Competency/{id}/edit',['as'=>'Competency.edit','uses'=>'Admin\CompetencyController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Competency/{id}',['as'=>'Competency.destroy','uses'=>'Admin\CompetencyController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Competency/{id}',['as'=>'Competency.update','uses'=>'Admin\CompetencyController@update'/*,'middleware' => ['permission:role-edit']*/]);

Route::get('VacancyTemplate/index',['as'=>'VacancyTemplate.index','uses'=>'Recruitment\VacancyTemplateController@index']);
Route::get('VacancyTemplate/create',['as'=>'VacancyTemplate.create','uses'=>'Recruitment\VacancyTemplateController@create']);
Route::post('VacancyTemplate/store',['as'=>'VacancyTemplate.store','uses'=>'Recruitment\VacancyTemplateController@store']);
Route::get('VacancyTemplate/{id}/edit',['as'=>'VacancyTemplate.edit','uses'=>'Recruitment\VacancyTemplateController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('VacancyTemplate/{id}',['as'=>'VacancyTemplate.destroy','uses'=>'Recruitment\VacancyTemplateController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('VacancyTemplate/{id}',['as'=>'VacancyTemplate.update','uses'=>'Recruitment\VacancyTemplateController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('Holidays/index',['as'=>'Holidays.index','uses'=>'Leave\HolidaysController@index']);
Route::get('Holidays/create',['as'=>'Holidays.create','uses'=>'Leave\HolidaysController@create']);
Route::post('Holidays/store',['as'=>'Holidays.store','uses'=>'Leave\HolidaysController@store']);
Route::get('Holidays/{id}/edit',['as'=>'Holidays.edit','uses'=>'Leave\HolidaysController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Holidays/{id}',['as'=>'Holidays.destroy','uses'=>'Leave\HolidaysController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Holidays/{id}',['as'=>'Holidays.update','uses'=>'Leave\HolidaysController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('Structure/index',['as'=>'Structure.index','uses'=>'Admin\StructureController@index']);
Route::get('Structure/create',['as'=>'Structure.create','uses'=>'Admin\StructureController@create']);
Route::post('Structure/store',['as'=>'Structure.store','uses'=>'Admin\StructureController@store']);
Route::get('Structure/{id}/edit',['as'=>'Structure.edit','uses'=>'Admin\StructureController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Structure/{id}',['as'=>'Structure.destroy','uses'=>'Admin\StructureController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Structure/{id}',['as'=>'Structure.update','uses'=>'Admiin\StructureController@update'/*,'middleware' => ['permission:role-edit']*/]);




Route::get('Benefits/index',['as'=>'Benefits.index','uses'=>'Admin\BenefitsController@index']);
Route::get('Benefits/create',['as'=>'Benefits.create','uses'=>'Admin\BenefitsController@create']);
Route::post('Benefits/store',['as'=>'Benefits.store','uses'=>'Admin\BenefitsController@store']);
Route::get('Benefits/{id}/edit',['as'=>'Benefits.edit','uses'=>'Admin\BenefitsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Benefits/{id}',['as'=>'Benefits.destroy','uses'=>'Admin\BenefitsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Benefits/{id}',['as'=>'Benefits.update','uses'=>'Admin\BenefitsController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('BenefitsPlanCoverage/index',['as'=>'BenefitsPlanCoverage.index','uses'=>'Admin\PlanCoverageController@index']);
Route::get('BenefitsPlanCoverage/create',['as'=>'BenefitsPlanCoverage.create','uses'=>'Admin\PlanCoverageController@create']);
Route::post('BenefitsPlanCoverage/store',['as'=>'BenefitsPlanCoverage.store','uses'=>'Admin\PlanCoverageController@store']);
Route::get('BenefitsPlanCoverage/{id}/edit',['as'=>'BenefitsPlanCoverage.edit','uses'=>'Admin\PlanCoverageController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('BenefitsPlanCoverage/{id}',['as'=>'BenefitsPlanCoverage.destroy','uses'=>'Admin\PlanCoverageController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('BenefitsPlanCoverage/{id}',['as'=>'BenefitsPlanCoverage.update','uses'=>'Admin\PlanCoverageController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('SalaryBenefit/index',['as'=>'SalaryBenefit.index','uses'=>'Pim\SalaryBenefitController@index']);
Route::get('SalaryBenefit/{id}/create',['as'=>'SalaryBenefit.create','uses'=>'Pim\SalaryBenefitController@create']);
Route::post('SalaryBenefit/store',['as'=>'SalaryBenefit.store','uses'=>'Pim\SalaryBenefitController@store']);
Route::get('SalaryBenefit/{id}/edit',['as'=>'SalaryBenefit.edit','uses'=>'Pim\SalaryBenefitController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('SalaryBenefit/{id}',['as'=>'SalaryBenefit.destroy','uses'=>'Pim\SalaryBenefitController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('SalaryBenefit/{id}',['as'=>'SalaryBenefit.update','uses'=>'Pim\SalaryBenefitController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('SalaryDetails/{id}/index',['as'=>'SalaryDetails.index','uses'=>'Pim\SalaryDetailsController@index']);
Route::get('SalaryDetails/{id}/create',['as'=>'SalaryDetails.create','uses'=>'Pim\SalaryDetailsController@create']);
Route::get('SalaryDetails/{id}/show',['as'=>'SalaryDetails.show','uses'=>'Pim\SalaryDetailsController@show']);
Route::post('SalaryDetails/store',['as'=>'SalaryDetails.store','uses'=>'Pim\SalaryDetailsController@store']);
Route::get('SalaryDetails/{id}/edit',['as'=>'SalaryDetails.edit','uses'=>'Pim\SalaryDetailsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('SalaryDetails/{id}',['as'=>'SalaryDetails.destroy','uses'=>'Pim\SalaryDetailsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('SalaryDetails/{id}',['as'=>'SalaryDetails.update','uses'=>'Pim\SalaryDetailsController@update'/*,'middleware' => ['permission:role-edit']*/]);




Route::get('SalaryDeduction/index',['as'=>'SalaryDeduction.index','uses'=>'Pim\SalaryDeductionController@index']);
Route::get('SalaryDeduction/create',['as'=>'SalaryDeduction.create','uses'=>'Pim\SalaryDeductionController@create']);
Route::post('SalaryDeduction/store',['as'=>'SalaryDeduction.store','uses'=>'Pim\SalaryDeductionController@store']);
Route::get('SalaryDeduction/{id}/edit',['as'=>'SalaryDeduction.edit','uses'=>'Pim\SalaryDeductionController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('SalaryDeduction/{id}',['as'=>'SalaryDeduction.destroy','uses'=>'Pim\SalaryDeductionController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('SalaryDeduction/{id}',['as'=>'SalaryDeduction.update','uses'=>'Pim\SalaryDeductionController@update'/*,'middleware' => ['permission:role-edit']*/]);






Route::get('Deductions/index',['as'=>'Deductions.index','uses'=>'Admin\DeductionController@index']);
Route::get('Deductions/create',['as'=>'Deductions.create','uses'=>'Admin\DeductionController@create']);
Route::post('Deductions/store',['as'=>'Deductions.store','uses'=>'Admin\DeductionController@store']);
Route::get('Deductions/{id}/edit',['as'=>'Deductions.edit','uses'=>'Admin\DeductionController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Deductions/{id}',['as'=>'Deductions.destroy','uses'=>'Admin\DeductionController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Deductions/{id}',['as'=>'Deductions.update','uses'=>'Admin\DeductionController@update'/*,'middleware' => ['permission:role-edit']*/]);





Route::get('Vacancy/index',['as'=>'Vacancy.index','uses'=>'Recruitment\VacancyController@index']);
Route::get('Vacancy/create',['as'=>'Vacancy.create','uses'=>'Recruitment\VacancyController@create']);
Route::post('Vacancy/store',['as'=>'Vacancy.store','uses'=>'Recruitment\VacancyController@store']);
Route::get('Vacancy/{id}/edit',['as'=>'Vacancy.edit','uses'=>'Recruitment\VacancyController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Vacancy/{id}',['as'=>'Vacancy.destroy','uses'=>'Recruitment\VacancyController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Vacancy/{id}',['as'=>'Vacancy.update','uses'=>'Recruitment\VacancyController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('Candidates/index',['as'=>'Candidates.index','uses'=>'Recruitment\CandidatesController@index']);
Route::get('Candidates/create',['as'=>'Candidates.create','uses'=>'Recruitment\CandidatesController@create']);
Route::post('Candidates/store',['as'=>'Candidates.store','uses'=>'Recruitment\CandidatesController@store']);
Route::get('Candidates/{id}/edit',['as'=>'Candidates.edit','uses'=>'Recruitment\CandidatesController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Candidates/{id}',['as'=>'Candidates.destroy','uses'=>'Recruitment\CandidatesController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Candidates/{id}',['as'=>'Candidates.update','uses'=>'Recruitment\CandidatesController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('TerminationReason/index',['as'=>'TerminationReason.index','uses'=>'Pim\TerminationReasonController@index']);
Route::get('TerminationReason/create',['as'=>'TerminationReason.create','uses'=>'Pim\TerminationReasonController@create']);
Route::post('TerminationReason/store',['as'=>'TerminationReason.store','uses'=>'Pim\TerminationReasonController@store']);
Route::get('TerminationReason/{id}/edit',['as'=>'TerminationReason.edit','uses'=>'Pim\TerminationReasonController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('TerminationReason/{id}',['as'=>'TerminationReason.destroy','uses'=>'Pim\TerminationReasonController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('TerminationReason/{id}',['as'=>'TerminationReason.update','uses'=>'Pim\TerminationReasonController@update'/*,'middleware' => ['permission:role-edit']*/]);




Route::get('QuestionPool/index',['as'=>'QuestionPool.index','uses'=>'Recruitment\QuestionPoolController@index']);
Route::get('QuestionPool/create',['as'=>'QuestionPool.create','uses'=>'Recruitment\QuestionPoolController@create']);
Route::post('QuestionPool/store',['as'=>'QuestionPool.store','uses'=>'Recruitment\QuestionPoolController@store']);
Route::get('QuestionPool/{id}/edit',['as'=>'QuestionPool.edit','uses'=>'Recruitment\QuestionPoolController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('QuestionPool/{id}',['as'=>'QuestionPool.destroy','uses'=>'Recruitment\QuestionPoolController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('QuestionPool/{id}',['as'=>'QuestionPool.update','uses'=>'Recruitment\QuestionPoolController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('WorkWeek/index',['as'=>'WorkWeek.index','uses'=>'Leave\WorkWeekController@index']);
Route::get('WorkWeek/create',['as'=>'WorkWeek.create','uses'=>'Leave\WorkWeekController@create']);
Route::post('WorkWeek/store',['as'=>'WorkWeek.store','uses'=>'Leave\WorkWeekController@store']);
Route::get('WorkWeek/{id}/edit',['as'=>'WorkWeek.edit','uses'=>'Leave\WorkWeekController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('WorkWeek/{id}',['as'=>'WorkWeek.destroy','uses'=>'Leave\WorkWeekController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('WorkWeek/{id}',['as'=>'WorkWeek.update','uses'=>'Leave\WorkWeekController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('InterviewTemplates/index',['as'=>'InterviewTemplates.index','uses'=>'Recruitment\InterviewTemplateController@index']);
Route::get('InterviewTemplates/create',['as'=>'InterviewTemplates.create','uses'=>'Recruitment\InterviewTemplateController@create']);
Route::post('InterviewTemplates/store',['as'=>'InterviewTemplates.store','uses'=>'Recruitment\InterviewTemplateController@store']);
Route::get('InterviewTemplates/{id}/edit',['as'=>'InterviewTemplates.edit','uses'=>'Recruitment\InterviewTemplateController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('InterviewTemplates/{id}',['as'=>'InterviewTemplates.destroy','uses'=>'Recruitment\InterviewTemplateController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('InterviewTemplates/{id}',['as'=>'InterviewTemplates.update','uses'=>'Recruitment\InterviewTemplatesController@update'/*,'middleware' => ['permission:role-edit']*/]);

//Pim Reports


Route::get('StandardTest/index',['as'=>'StandardTest.index','uses'=>'Recruitment\StandardTestController@index']);
Route::get('StandardTest/create',['as'=>'StandardTest.create','uses'=>'Recruitment\StandardTestController@create']);
Route::post('StandardTest/store',['as'=>'StandardTest.store','uses'=>'Recruitment\StandardTestController@store']);
Route::get('StandardTest/{id}/edit',['as'=>'StandardTest.edit','uses'=>'Recruitment\StandardTestController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('StandardTest/{id}',['as'=>'StandardTest.destroy','uses'=>'Recruitment\StandardTestController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('StandardTest/{id}',['as'=>'StandardTest.update','uses'=>'Recruitment\StandardTestController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('PayrollReport/index',['as'=>'PayrollReport.index','uses'=>'Pim\ReportsController@PayrollReport']);

Route::post('PayrollReportSearch/store',['as'=>'PayrollReportSearch.store','uses'=>'Pim\ReportsController@PayrollReportSearch']);

Route::get('EmployeePayslip/{id}/view',['as'=>'EmployeePayslip.view','uses'=>'Pim\ReportsController@ViewPaySlip', /*'middleware' => ['permission:role-edit']*/]);


Route::get('ProcessPayroll/index',['as'=>'ProcessPayroll.index','uses'=>'Admin\ProcessPayrollController@index']);

Route::get('ProcessPayroll/decision',['as'=>'ProcessPayroll.decision','uses'=>'Admin\ProcessPayrollController@decision']);

Route::post('ProcessPayroll/makedecision',['as'=>'ProcessPayroll.makedecision','uses'=>'Admin\ProcessPayrollController@makedecision']);

Route::post('ProcessPayroll/store',['as'=>'ProcessPayroll.store','uses'=>'Admin\ProcessPayrollController@store']);


Route::get('ProcessPayroll/processSpiceHRPayroll',['as'=>'ProcessPayroll.processSpiceHRPayroll','uses'=>'Admin\ProcessPayrollController@processSpiceHRPayroll']);


Route::get('ProcessPayroll/SelfprocessPayroll',['as'=>'ProcessPayroll.SelfprocessPayroll','uses'=>'Admin\ProcessPayrollController@SelfprocessPayroll']);


Route::get('ProcessPayroll/{id}/ViewProcessedSalaries',['as'=>'ProcessPayroll.ViewProcessedSalaries','uses'=>'Admin\ProcessPayrollController@ViewProcessedSalaries']);


Route::get('ProcessPayroll/{id}/PrintPayslip',['as'=>'ProcessPayroll.PrintPayslip','uses'=>'Admin\ProcessPayrollController@PrintPayslip']);

Route::get('ProcessPayroll/{id}/PrintPayslips',['as'=>'ProcessPayroll.PrintPayslips','uses'=>'BI\BiController@PrintPayslips']);






Route::get('Payroll/NHIFStructures',['as'=>'Payroll.NHIFStructures','uses'=>'Admin\ProcessPayrollController@PayrollNHIFStructures']);

Route::get('Payroll/PayeSettings',['as'=>'Payroll.PayeSettings','uses'=>'Admin\ProcessPayrollController@PayrollPayeSettings']);




Route::get('AjaxProcessPayroll','Admin\AdminAjaxController@processPayroll');

Route::get('onboarding/index','Onboarding\Onboarding@index');


Route::get('organizationchart/index','OrganizationChart\OrganizationChartController@index');


Route::get('organizationchart/index','OrganizationChart\OrganizationChartController@index');


Route::get('assets/index','Assets\AssetsController@index');



Route::get('Events/index',['as'=>'Events.index','uses'=>'Onboarding\EventController@index']);
Route::get('Events/create',['as'=>'Events.create','uses'=>'Onboarding\EventController@create']);
Route::post('Events/store',['as'=>'Events.store','uses'=>'Onboarding\EventController@store']);
Route::get('Events/{id}/edit',['as'=>'Events.edit','uses'=>'Onboarding\EventController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Events/{id}',['as'=>'Events.destroy','uses'=>'Onboarding\EventController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Events/{id}',['as'=>'Events.update','uses'=>'Onboarding\EventController@update'/*,'middleware' => ['permission:role-edit']*/]);




Route::get('TaskTypes/index',['as'=>'TaskTypes.index','uses'=>'Onboarding\TaskTypesController@index']);
Route::get('TaskTypes/create',['as'=>'TaskTypes.create','uses'=>'Onboarding\TaskTypesController@create']);
Route::post('TaskTypes/store',['as'=>'TaskTypes.store','uses'=>'Onboarding\TaskTypesController@store']);
Route::get('TaskTypes/{id}/edit',['as'=>'TaskTypes.edit','uses'=>'Onboarding\TaskTypesController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('TaskTypes/{id}',['as'=>'TaskTypes.destroy','uses'=>'Onboarding\TaskTypesController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('TaskTypes/{id}',['as'=>'TaskTypes.update','uses'=>'Onboarding\TaskTypesController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('EmployeeTasks/index',['as'=>'EmployeeTasks.index','uses'=>'Onboarding\EmployeeTasksController@index']);
Route::get('EmployeeTasks/create',['as'=>'EmployeeTasks.create','uses'=>'Onboarding\EmployeeTasksController@create']);
Route::post('EmployeeTasks/store',['as'=>'EmployeeTasks.store','uses'=>'Onboarding\EmployeeTasksController@store']);
Route::get('EmployeeTasks/{id}/edit',['as'=>'EmployeeTasks.edit','uses'=>'Onboarding\EmployeeTasksController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('EmployeeTasks/{id}',['as'=>'EmployeeTasks.destroy','uses'=>'Onboarding\EmployeeTasksController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('EmployeeTasks/{id}',['as'=>'EmployeeTasks.update','uses'=>'Onboarding\EmployeeTasksController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('Assets/index',['as'=>'Assets.index','uses'=>'Assets\AssetsController@index']);
Route::get('Assets/create',['as'=>'Assets.create','uses'=>'Assets\AssetsController@create']);
Route::post('Assets/store',['as'=>'Assets.store','uses'=>'Assets\AssetsController@store']);
Route::get('Assets/{id}/edit',['as'=>'Assets.edit','uses'=>'Assets\AssetsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Assets/{id}',['as'=>'Assets.destroy','uses'=>'Assets\AssetsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Assets/{id}',['as'=>'Assets.update','uses'=>'Assets\AssetsController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('Brands/index',['as'=>'Brands.index','uses'=>'Assets\BrandsController@index']);
Route::get('Brands/create',['as'=>'Brands.create','uses'=>'Assets\BrandsController@create']);
Route::post('Brands/store',['as'=>'Brands.store','uses'=>'Assets\BrandsController@store']);
Route::get('Brands/{id}/edit',['as'=>'Brands.edit','uses'=>'Assets\BrandsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Brands/{id}',['as'=>'Brands.destroy','uses'=>'Assets\BrandsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Brands/{id}',['as'=>'Brands.update','uses'=>'Assets\BrandsController@update'/*,'middleware' => ['permission:role-edit']*/]);

Route::get('AssetCategory/index',['as'=>'AssetCategory.index','uses'=>'Assets\CategoriesController@index']);
Route::get('AssetCategory/create',['as'=>'AssetCategory.create','uses'=>'Assets\CategoriesController@create']);
Route::post('AssetCategory/store',['as'=>'AssetCategory.store','uses'=>'Assets\CategoriesController@store']);
Route::get('AssetCategory/{id}/edit',['as'=>'AssetCategory.edit','uses'=>'Assets\CategoriesController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('AssetCategory/{id}',['as'=>'AssetCategory.destroy','uses'=>'Assets\CategoriesController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('AssetCategory/{id}',['as'=>'AssetCategory.update','uses'=>'Assets\CategoriesController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('Vendors/index',['as'=>'Vendors.index','uses'=>'Assets\VendorsController@index']);
Route::get('Vendors/create',['as'=>'Vendors.create','uses'=>'Assets\VendorsController@create']);
Route::post('Vendors/store',['as'=>'Vendors.store','uses'=>'Assets\VendorsController@store']);
Route::get('Vendors/{id}/edit',['as'=>'Vendors.edit','uses'=>'Assets\VendorsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Vendors/{id}',['as'=>'Vendors.destroy','uses'=>'Assets\VendorsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Vendors/{id}',['as'=>'Vendors.update','uses'=>'Assets\VendorsController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('EmployeeDocuments/{id}/index',['as'=>'EmployeeDocuments.index','uses'=>'Pim\EmployeeDocumentsController@index']);
Route::get('EmployeeDocuments/{id}/create',['as'=>'EmployeeDocuments.create','uses'=>'Pim\EmployeeDocumentsController@create']);
Route::post('EmployeeDocuments/store',['as'=>'EmployeeDocuments.store','uses'=>'Pim\EmployeeDocumentsController@store']);
Route::get('EmployeeDocuments/{id}/edit',['as'=>'EmployeeDocuments.edit','uses'=>'Pim\EmployeeDocumentsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('EmployeeDocuments/{id}',['as'=>'EmployeeDocuments.destroy','uses'=>'Pim\EmployeeDocumentsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('EmployeeDocuments/{id}',['as'=>'EmployeeDocuments.update','uses'=>'Pim\EmployeeDocumentsController@update'/*,'middleware' => ['permission:role-edit']*/]);

Route::get('EmpEducation/index',['as'=>'EmpEducation.index','uses'=>'Pim\EmpEducationController@index']);
Route::get('EmpEducation/{id}/create',['as'=>'EmpEducation.create','uses'=>'Pim\EmpEducationController@create']);
Route::post('EmpEducation/store',['as'=>'EmpEducation.store','uses'=>'Pim\EmpEducationController@store']);
Route::get('EmpEducation/{id}/edit',['as'=>'EmpEducation.edit','uses'=>'Pim\EmpEducationController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('EmpEducation/{id}',['as'=>'EmpEducation.destroy','uses'=>'Pim\EmpEducationController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('EmpEducation/{id}',['as'=>'EmpEducation.update','uses'=>'Pim\EmpEducationController@update'/*,'middleware' => ['permission:role-edit']*/]);




Route::get('EmpSkill/index',['as'=>'EmpSkill.index','uses'=>'Pim\EmpSkillController@index']);
Route::get('EmpSkill/{id}/create',['as'=>'EmpSkill.create','uses'=>'Pim\EmpSkillController@create']);
Route::post('EmpSkill/store',['as'=>'EmpSkill.store','uses'=>'Pim\EmpSkillController@store']);
Route::get('EmpSkill/{id}/edit',['as'=>'EmpSkill.edit','uses'=>'Pim\EmpSkillController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('EmpSkill/{id}',['as'=>'EmpSkill.destroy','uses'=>'Pim\EmpSkillController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('EmpSkill/{id}',['as'=>'EmpSkill.update','uses'=>'Pim\EmpSkillController@update'/*,'middleware' => ['permission:role-edit']*/]);


Route::get('Training/index',['as'=>'Training.index','uses'=>'Training\TrainingController@index']);
Route::get('Training/{id}/create',['as'=>'Training.create','uses'=>'Training\TrainingController@create']);
Route::post('Training/store',['as'=>'Training.store','uses'=>'Training\TrainingController@store']);
Route::get('Training/{id}/edit',['as'=>'Training.edit','uses'=>'Training\TrainingController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::get('Training/{id}/show',['as'=>'Training.show','uses'=>'Training\TrainingController@show', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Training/{id}',['as'=>'Training.destroy','uses'=>'Training\TrainingController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Training/{id}',['as'=>'Training.update','uses'=>'Training\TrainingController@update'/*,'middleware' => ['permission:role-edit']*/]);



Route::get('EmpJobDetails/{id}/index',['as'=>'EmpJobDetails.index','uses'=>'Pim\EmpJobDetailsController@index']);
Route::get('EmpJobDetails/{id}/create',['as'=>'EmpJobDetails.create','uses'=>'Pim\EmpJobDetailsController@create']);
Route::post('EmpJobDetails/store',['as'=>'EmpJobDetails.store','uses'=>'Pim\EmpJobDetailsController@store']);
Route::get('EmpJobDetails/{id}/edit',['as'=>'EmpJobDetails.edit','uses'=>'Pim\EmpJobDetailsController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('EmpJobDetails/{id}',['as'=>'EmpJobDetails.destroy','uses'=>'Pim\EmpJobDetailsController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('EmpJobDetails/{id}',['as'=>'EmpJobDetails.update','uses'=>'Pim\EmpJobDetailsController@update'/*,'middleware' => ['permission:role-edit']*/]);

Route::get('BiReport/index',['as'=>'BiReport.index','uses'=>'BI\BiController@index']);

Route::get('BIEmployeePayslip/report',['as'=>'BiReport.show','uses'=>'BI\BiController@BIEmployeePayslips']);

Route::get('BIEmployeePayslip/PayslipIndividualReport',['as'=>'Payslip.IndividualReport','uses'=>'BI\BiController@PayslipIndividualReport']);


Route::get('BIEmployeePayslip/PayslipNhifReport',['as'=>'Payslip.NhifReport','uses'=>'BI\BiController@PayslipNhifReport']);

Route::get('BIEmployeePayslip/PayslipNssfReport',['as'=>'Payslip.NssfReport','uses'=>'BI\BiController@PayslipNssfReport']);


Route::get('ProcessedSalaries/report',['as'=>'ProcessedSalaries.NssfReport','uses'=>'BI\BiController@ProcessedSalariesReport']);

Route::get('ProcessedPayslip/Select',['as'=>'ProcessedPayslip.Select','uses'=>'BI\BiController@ProcessedPayslipSelect']);



Route::get('PayslipBIEmployeePayslip/report',['as'=>'BiReport.PayslipBIEmployeePayslip','uses'=>'BI\BiController@PayslipBIEmployeePayslip']);


Route::get('NhifBIEmployeePayslip/report',['as'=>'BiReport.NhifBIEmployeePayslip','uses'=>'BI\BiController@NhifBIEmployeePayslip']);

Route::get('NSSfBIEmployeePayslip/report',['as'=>'BiReport.NSSfBIEmployeePayslip','uses'=>'BI\BiController@NSSfBIEmployeePayslip']);

Route::get('BiLeaveChart/report',['as'=>'BiReport.BiLeaveChart','uses'=>'BI\BiController@BiLeaveChart']);

Route::get('BiLeaveReports/report',['as'=>'BiReport.BiLeaveReports','uses'=>'BI\BiController@BiLeaveReports']);

Route::get('MonthlyPayrollSummary/report',['as'=>'BiReport.MonthlyPayrollSummary','uses'=>'BI\BiController@MonthlyPayrollSummaryReports']);

Route::get('KRAP10/report',['as'=>'KRAP10.report','uses'=>'BI\BiController@KRAP10report']);

Route::get('NetPayBankRegister/report',['as'=>'NetPayBankRegister.report','uses'=>'BI\BiController@NetPayBankRegisterreport']);


Route::get('Payslip/KRAP10Report',['as'=>'Payslip.KRAP10Report','uses'=>'BI\BiController@PayslipKRAP10Report']);

Route::get('Payslip/MonthlyPayrollSummaryReport',['as'=>'Payslip.MonthlyPayrollSummaryReport','uses'=>'BI\BiController@PayslipMonthlyPayrollSummaryReport']);

Route::get('Leave/IndividualReport',['as'=>'Leave.IndividualReport','uses'=>'BI\BiController@LeaveIndividualReport']);

Route::get('Payslip.NetBankRegisterReport',['as'=>'Payslip.NetBankRegisterReport','uses'=>'BI\BiController@PayslipNetBankRegisterReport']);

Route::get('Onboardings/index',['as'=>'Onboardings.index','uses'=>'Admin\OnboardingController@index']);

Route::get('Offboarding/index',['as'=>'Offboarding.index','uses'=>'Admin\OffboardingController@index']);

Route::get('EmployeeOnboarding/{id}/edit',['as'=>'EmployeeOnboarding.edit','uses'=>'Pim\EmpOnboardingController@edit']);
Route::post('EmployeeOnboarding/store',['as'=>'EmployeeOnboarding.store','uses'=>'Pim\EmployeeOnboardingController@store']);
Route::patch('EmployeeOnboarding/{id}',['as'=>'EmployeeOnboarding.update','uses'=>'Pim\EmployeeOnboardingController@update']);


Route::get('EmployeeOffloading/{id}/edit',['as'=>'EmployeeOffloading.edit','uses'=>'Pim\EmpOffloadingController@edit']);

Route::post('EmployeeOffloading/store',['as'=>'EmployeeOffloading.store','uses'=>'Pim\EmpOffloadingController@store']);
Route::patch('EmployeeOffloading/{id}',['as'=>'EmployeeOffloading.update','uses'=>'Pim\EmpOffloadingController@update']);



/*Route::get('/pdfex', function () {
NhifBIEmployeePayslip
     $pdf = new Fpdf('L','mm','A3');
     $pdf->AddPage();
     $pdf->AliasNbPages();

     $pdf->SetFont('Courier', 'B', 18);
     $pdf->Cell(50, 25, 'Hello World!');
     $pdf->Output();
   exit;
});
*/

});
