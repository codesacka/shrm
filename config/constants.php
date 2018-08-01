<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


return [

    'topmenu'=>  array('admin/index'=>'Get Started','/pim/index'=>'PIM','/leave/index'=>'Leave','/time/index'=>'Time','/Vacancy/index'=>'Recruitment',
                       '/ManageTrackers/index'=>'Performance',
                       ),
    'more'=> array('onboarding/index'=>'Onboarding'/*,'dashboard/index'=>'Dashboard'*/,'organizationchart/index'=>'Organization Chart','assets/index'=>'Assets'),

    'adminmenu' =>array('admin/index'=>'User','admin/index'=>'Job','admin/index'=>'Organization'),

    'Admin'   =>array('admin/index'=>'User','admin/index'=>'Roles','admin/index'=>'Permissions'),

    'PIM'   =>array('admin/index'=>'User','admin/index'=>'Roles','admin/index'=>'Permissions'),

    'Leave'   =>array('admin/index'=>'User','admin/index'=>'Roles','admin/index'=>'Permissions'),

    'Leave'   =>array('admin/index'=>'User','admin/index'=>'Roles','admin/index'=>'Permissions'),


    //Messages

    'dashboard_welcomemessage'=>'Welcome to Spice HR',
    'dashboard_welcomemessage2'=>'  Let’s set up your company together. It’s best to complete everything at once, but if you need to take a break, don’t worry. We’ll save your progress.
',



    'dashboard_admindocuments'=>'Important Documents Securely Stored Here',
    'dashboard_admindocuments2'=>'SpiceHR automatically fills out all government documents on behalf of your company. Also, when a document is due, we will automatically file it for you. All of your documents are stored on our secured system and you can always reference them here - even at 3 in the morning.
',




    'dashboard_leavemessage'=>'Time Off/Leave Off',
    'dashboard_leavemessage2'=>'Whether they’re relaxing in the sun or recuperating from a cold, your team will feel more energized, happier, and productive with the benefit of paid time off.',



    'admin_settings'=>'Administrative Settings',
    'admin_settings2'=>'Whether they’re relaxing in the sun or recuperating from a cold, your team will feel more energized, happier, and productive with the benefit of paid time off.',



    'recruitment_settings'=>'Hiring and Vacancy  Settings',
    'recruitment_settings2'=>'Whether they’re relaxing in the sun or recuperating from a cold, your team will feel more energized, happier, and productive with the benefit of paid time off.',



    'employeelist'=>'Employee list',
    
    'sidemenu'=>array('Account Settings' => array('icon'=>'fa-cog','submodule'=> 
                                   array('Company.Profile'=>array('icon'=>'fa-dashboard','name'=> 'Company Profile'),
                                         'Locations.index'=>array('icon'=>'fa-location-arrow','name'=>'Branches/Location'),
                                         'Nationality.index'=>array('icon'=>'fa-location-arrow','name'=>'Nationality'),
                                         'JobTitle.index'=>array('icon'=>'fa-location-arrow','name'=>'Job Title'),
                                         'JobCategory.index'=>array('icon'=>'fa-location-arrow','name'=>'Department'),
                                         'EmploymentStatus.index'=>array('icon'=>'fa-location-arrow','name'=>'Employment Status'),
                                         'Skill.index'=>array('icon'=>'fa-location-arrow','name'=>'Skills'),
                                         'Education.index'=>array('icon'=>'fa-location-arrow','name'=>'Education'),
                                         'License.index'=>array('icon'=>'fa-location-arrow','name'=>'Licenses'),
                                         'Language.index'=>array('icon'=>'fa-location-arrow','name'=>'Languages'),
                                         'Membership.index'=>array('icon'=>'fa-location-arrow','name'=>'Membership')
                                       )),
        
                     'Access Management' => array('icon'=>'fa-user','submodule'=>
                                  
                                   array('users.index'=>array('icon'=>'fa-dashboard','name'=> 'Users'),
                                         'roles.index'=>array('icon'=>'fa-dashboard','name'=> 'Access Levels'),
                                         'permission.index'=>array('icon'=>'fa-dashboard','name'=> 'Permission')
                                       )),
        
                     'Leave Settings' => array('icon'=>'fa-calendar','submodule'=> 
                                   array('Holidays.index'=>array('icon'=>'fa-dashboard','name'=> 'Holidays'),
                                         'LeaveType.index'=>array('icon'=>'fa-dashboard','name'=> 'Leave type'),
                                       )),
        
                     'Payroll' => array('icon'=>'fa-wrench','submodule'=> 
                                   array('Benefits.index'=>array('icon'=>'fa-dashboard','name'=> 'Benefits'),
                                        'BenefitsPlanCoverage.index'=>array('icon'=>'fa-dashboard','name'=> 'Benefits Coverage'),
                                        'Deductions.index'=>array('icon'=>'fa-dashboard','name'=> 'Deductions'),
                                        'BankDetails.index'=>array('icon'=>'fa-dashboard','name'=> 'Banks')
                                       
                                       )),
                     'Onboarding' => array('icon'=>'fa-sign-in','submodule'=> 
                                     array('Onboardings.index'=>array('icon'=>'fa-dashboard','name'=> 'Onboarding Tasks'),
                                        
                                       )),
                     'Offboarding' => array('icon'=>'fa-sign-out','submodule'=> 
                                   array('Offboarding.index'=>array('icon'=>'fa-dashboard','name'=> 'Offboarding Tasks'),
                                       
                                       )),
        
        
        
                   ),

    'employeelist2'=>'Welcome to Spice HRM',
    'companysettingsmenu' =>array('Company.Profile'=>'Company Overview','Company.TaxInfo'=>'Tax Info','Company.BillingPayments'=>'Billing & Payments','Locations.index'=>'Addresses &amp; Departments'),
    'employeemenu' =>array('Employee.create'=>'Personal  Information','EmploymentCompensation.create'=>'Compensation Information','BankInformation.create'=>'Bank Information'),
    'employeemenu2' =>array('Employee.create'=>'Personal  Information',''=>'Compensation Information',''=>'Bank Information'),
    'employeemenu3' =>array('Employee.edit'=>'Edit Personal  Information','EmploymentCompensation.edit'=>'Edit Compensation Information','EditBankInformation.edit'=>'Edit Bank Information'),

    'employeepersonalmenu' =>array('Employee.show'=>'Personal  Information','SalaryDetails.show'=>'Pay Info','EmpJobDetails.create'=>'Job','AssignLeave.request'=>'Time off','Documents.employeedocuments'=>'Documents'),
    'employeepersonalmenuicon' =>array('Personal  Information'=>'fa-list-alt','Pay Info'=>'fa-money','Job'=>'fa-tasks','Benefits'=>'fa-plus-square-o','Deductions'=>'fa-minus','Time off'=>'fa-calendar','Documents'=>' fa-folder-open-o'),


    'emails' => [
        'host' => 'in-v3.mailjet.com',
        'port' => 587,
        'username' => 'ca0290a248e42bdff8ede6e432856902',
        'password' => 'c6241f01b354f930b53421d531d7cee4',
        'emailfrom'=>'klunwebale@gmail.com',
        'namefrom'=>'Firstname Lastname'
        // etc
    ],

    'hostname'=>'spicehrm.com',
    'opentime'=>'Monday - Saturday, 8am to 10pm',
    'callnumber'=>'Call us now +254 730 040 001',
    'welcome_spicehrm'=>'Welcome to Spice HRM',

    'report'=>array( //'OrganisationChart\report'=>'Organisation Chart',
        
        'BiLeaveChart\report'=>'Leave Chart','BiLeaveReports\report'=>'Leave Reports',
                                'ProcessedSalaries/report'=>'Processed Salaries Reports'
                                ,'PayslipBIEmployeePayslip/report'=>'Payslip Reports',
                    'NhifBIEmployeePayslip/report'=>'NHIF Mothly Reports','NSSfBIEmployeePayslip/report'=>'NSSF Monthly  Reports',
                    'KRAP10/report'=>'KRA P10  Reports','MonthlyPayrollSummary/report'=>'Monthly Payroll Summary Reports',
                    'NetPayBankRegister/report'=>'Net Pay Bank Register Reports'),


    'employeeprofinfo'=>array('Employee.edit'=>array('icon'=>'fa-home','name'=>'Personal'),'EmpJobDetails.index'=>array('icon'=>'fa-file-text-o','name'=>'Job'),
        'AssignLeave.index'=>array('icon'=>'fa-calendar','name'=>'Leave'),'EmergencyContacts.index'=>array('icon'=>'fa-phone','name'=>'Emergency'),
        'EmpDocuments.view'=>array('icon'=>'fa-folder-o','name'=>'Documents'),'SalaryDetails.index'=>array('icon'=>'fa-balance-scale','name'=>'Pay Info'),
        

        'More'=>array('EmployeeReporting.edit'=>array('icon'=>'fa-sitemap','name'=>'Report to'),
           // '1'=>array('icon'=>'fa-cog','name'=>'Assets'),
            
            'EmployeeOnboarding.edit'=>array('icon'=>'fa-cog','name'=>'Onboarding'),
            'EmployeeOffloading.edit'=>array('icon'=>'fa-cog','name'=>'Offloading'))),


];
