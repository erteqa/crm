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

Route::prefix('/')->group(function () {

    Route::get('Univer','Setting_cont@univ')->name('univ');
    Route::post('Univer','Setting_cont@univ')->name('univ');

    Route::post('Univer/{uid}/{gid}','Setting_cont@univ')->name('univ');
    Route::get('Univer/{uid}/{gid}','Setting_cont@univ')->name('univ');

    Route::get('univer','Setting_cont@univ')->name('univ');
    Route::post('univer','Setting_cont@univ')->name('univ');

////جامعات خاصة//////
    Route::get('Pruniver','Setting_cont@Pruniver')->name('Pruniver');
    Route::post('Pruniver','Setting_cont@Pruniver')->name('Pruniver');

    Route::get('Pruniver/{id}/{gid}','Setting_cont@Pruniver')->name('Pruniver');
    Route::post('Pruniver/{id}/{gid}','Setting_cont@Pruniver')->name('Pruniver');
/// /
    Route::get('AcademyForm','Setting_cont@academyform')->name('academyform');
    Route::post('AcademyForm','Setting_cont@academyform')->name('academyform');

    Route::get('AcademyForm/{id}/{gid}','Setting_cont@academyform')->name('academyform');
    Route::post('AcademyForm/{id}/{gid}','Setting_cont@academyform')->name('academyform');

    ////تأسيس شركات//////
    Route::get('Compcreate','Setting_cont@Compcreate')->name('Compcreate');
    Route::post('Compcreate','Setting_cont@Compcreate')->name('Compcreate');

    Route::get('Compcreate/{id}/{gid}','Setting_cont@Compcreate')->name('Compcreate');
    Route::post('Compcreate/{id}/{gid}','Setting_cont@Compcreate')->name('Compcreate');
/// /

});

Route::prefix('Academy')->group(function () {
    Route::prefix('Course')->group(function () {
        Route::get('/', 'Academy\Course_cont@index')->name('Course.Index');

        Route::get('Add', 'Academy\Course_cont@add')->name('Course.Add');
        Route::post('Add', 'Academy\Course_cont@add')->name('Course.Add');

        Route::get('Update/{id}', 'Academy\Course_cont@update')->name('Course.Update');
        Route::post('Update/{id}', 'Academy\Course_cont@update')->name('Course.Update');

        Route::get('Delete/{id}', 'Academy\Course_cont@delete')->name('Course.Delete');
        Route::post('Delete/{id}', 'Academy\Course_cont@delete')->name('Course.Delete');

        Route::get('View/{id}', 'Academy\Course_cont@view')->name('Course.View');
        Route::post('View/{id}', 'Academy\Course_cont@view')->name('Course.View');

    });
    Route::prefix('Lesson')->group(function () {
        Route::get('{id}', 'Academy\Lesson_cont@index')->name('Lesson.Index');

        Route::get('Add/{id}', 'Academy\Lesson_cont@add')->name('Lesson.Add');
        Route::post('Add/{id}', 'Academy\Lesson_cont@add')->name('Lesson.Add');

        Route::get('Update/{id}', 'Academy\Lesson_cont@update')->name('Lesson.Update');
        Route::post('Update/{id}', 'Academy\Lesson_cont@update')->name('Lesson.Update');

        Route::get('Delete/{id}', 'Academy\Lesson_cont@delete')->name('Lesson.Delete');
        Route::post('Delete/{id}', 'Academy\Lesson_cont@delete')->name('Lesson.Delete');

        Route::get('View/{id}', 'Academy\Lesson_cont@view')->name('Lesson.View');
        Route::post('View/{id}', 'Academy\Lesson_cont@view')->name('Lesson.View');

    });
    Route::prefix('Part')->group(function () {
        Route::get('{id}', 'Academy\Part_cont@index')->name('Part.Index');

        Route::get('Add/{id}', 'Academy\Part_cont@add')->name('Part.Add');
        Route::post('Add/{id}', 'Academy\Part_cont@add')->name('Part.Add');

        Route::get('Update/{id}', 'Academy\Part_cont@update')->name('Part.Update');
        Route::post('Update/{id}', 'Academy\Part_cont@update')->name('Part.Update');

        Route::get('Delete/{id}', 'Academy\Part_cont@delete')->name('Part.Delete');
        Route::post('Delete/{id}', 'Academy\Part_cont@delete')->name('Part.Delete');

        Route::get('View/{id}', 'Academy\Part_cont@view')->name('Part.View');
        Route::post('View/{id}', 'Academy\Part_cont@view')->name('Part.View');

    });
});
Route::prefix('BackupDb')->group(function () {
    Route::get('/','BackupController@index')->name('BackupIndex');
    Route::get('create', 'BackupController@create')->name('Backup.Create');
    Route::get('download/{file_name}', 'BackupController@download')->name('Backup.Download');
    Route::get('delete/{file_name}', 'BackupController@delete')->name('Backup.Delete');

    Route::post('/','BackupController@index')->name('Backup.Index');
    Route::post('create', 'BackupController@create')->name('Backup.Add');
    Route::post('download/{file_name}', 'BackupController@download')->name('Backup.Download');
    Route::post('delete/{file_name}', 'BackupController@delete')->name('Backup.Delete');
});


Route::get('importExport', 'MaatwebsiteDemoController@importExport')->name('ImportExport');
Route::get('downloadExcel', 'MaatwebsiteDemoController@downloadExcel')->name('DownloadExcel');;
Route::post('downloadExcel', 'MaatwebsiteDemoController@downloadExcel')->name('DownloadExcel');;
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel')->name('ImportExcel');

Route::get('lang/{lang}', 'Style_cont@lang')->name('lang');

Route::get('Cu_lang/{lang}', 'Style_cont@cu_lang')->name('cu.lang');

Route::get('/','Admin\Dashboard_cont@login')->name('login');
Route::get('Customer/login','Customer\Dashboard_cont@login')->name('Customer_login');
//
Route::group(['prefix' => 'Acounting','middleware' => 'UserIslogin'],function () {

    Route::prefix('Invoice')->group(function () {
        Route::get('Index/{type}', 'Accounting\Invoice_cont@index')->name('Index.Invoice');

        Route::get('Print/{id}/{type}', 'Accounting\Invoice_cont@printinvoice')->name('Invoice.Download');
//        Route::post('Download/{id}', 'Accounting\Invoice_cont@printinvoice')->name('Invoice.Download');

        Route::get('Add', 'Accounting\Invoice_cont@add')->name('Add.Invoice');
        Route::post('Add', 'Accounting\Invoice_cont@add')->name('Add.Invoice');

        Route::get('Update/{id}', 'Accounting\Invoice_cont@update')->name('Invoice.Update');
        Route::post('Update/{id}', 'Accounting\Invoice_cont@update')->name('Invoice.Update');

        Route::get('Delete/{id}', 'Accounting\Invoice_cont@delete')->name('Invoice.Delete');
        Route::post('Delete/{id}', 'Accounting\Invoice_cont@delete')->name('Invoice.Delete');

        Route::get('ForceDelete/{id}', 'Accounting\Invoice_cont@forcedelete')->name('Invoice.ForceDelete');
        Route::get('Restor/{id}', 'Accounting\Invoice_cont@restore')->name('Invoice.Restor');

        Route::get('Payment/{id}', 'Accounting\Invoice_cont@payment')->name('Invoice.Payment');


        Route::get('SendEmail/{id}/{type}', 'Accounting\Invoice_cont@sendemail')->name('Invoice.SendEmail');
        Route::post('SendEmail/{id}/{type}', 'Accounting\Invoice_cont@sendemail')->name('Invoice.SendEmail');

        Route::get('SendSms/{id}/{type}', 'Accounting\Invoice_cont@sendsms')->name('Invoice.SendSms');
        Route::post('SendSms/{id}/{type}', 'Accounting\Invoice_cont@sendsms')->name('Invoice.SendSms');

        Route::get('View/{id}', 'Accounting\Invoice_cont@view')->name('Invoice.View');

        Route::get('Cancel/{id}', 'Accounting\Invoice_cont@cancel')->name('Invoice.Cancel');

        Route::get('Recharg/{id}', 'Accounting\Invoice_cont@recharg')->name('Invoice.Recharg');
        Route::post('Recharg/{id}', 'Accounting\Invoice_cont@recharg')->name('Invoice.Recharg');

//        Route::get('Download/{id}', 'Accounting\Invoice_cont@download')->name('Invoice.Download');

        Route::get('GetCustomer', 'Accounting\Invoice_cont@getcusinfo')->name('GetCustomer');
        Route::post('GetCustomer', 'Accounting\Invoice_cont@getcusinfo')->name('GetCustomer');

        Route::get('GetCustomer', 'Accounting\Invoice_cont@csearch')->name('csearch');
    });
    Route::prefix('Mail')->group(function () {
        Route::get('/', 'Setting_cont@mailindex')->name('Mail.Index');
        Route::post('/', 'Setting_cont@mailindex')->name('Mail.Index');
    });
    Route::prefix('Payment')->group(function () {
        Route::get('GetTid', 'Accounting\Payment_cont@getcusinfo')->name('GetTid');
        Route::post('GetTid', 'Accounting\Payment_cont@getcusinfo')->name('GetTid');

        Route::get('Add', 'Accounting\Payment_cont@add')->name('Payment.Add');
        Route::post('Add', 'Accounting\Payment_cont@add')->name('Payment.Add');

        Route::get('Index/{type}', 'Accounting\Payment_cont@index')->name('Payment.Index');

        Route::get('Update/{id}', 'Accounting\Payment_cont@update')->name('Payment.Update');
        Route::post('Update/{id}', 'Accounting\Payment_cont@update')->name('Payment.Update');

        Route::get('Delete/{id}', 'Accounting\Payment_cont@delete')->name('Payment.Delete');
        Route::post('Delete/{id}', 'Accounting\Payment_cont@delete')->name('Payment.Delete');

        Route::get('ForceDelete/{id}', 'Accounting\Payment_cont@forcedelete')->name('Payment.ForceDelete');
        Route::get('Restor/{id}', 'Accounting\Payment_cont@restore')->name('Payment.Restor');
        Route::get('View/{id}', 'Accounting\Payment_cont@view')->name('Payment.View');



    });
    Route::prefix('Expense')->group(function () {

        Route::get('Add', 'Accounting\Expense_cont@add')->name('Expense.Add');
        Route::post('Add', 'Accounting\Expense_cont@add')->name('Expense.Add');

        Route::get('Index/{type}', 'Accounting\Expense_cont@index')->name('Expense.Index');

        Route::get('Update/{id}', 'Accounting\Expense_cont@update')->name('Expense.Update');
        Route::post('Update/{id}', 'Accounting\Expense_cont@update')->name('Expense.Update');

        Route::get('Delete/{id}', 'Accounting\Expense_cont@delete')->name('Expense.Delete');
        Route::post('Delete/{id}', 'Accounting\Expense_cont@delete')->name('Expense.Delete');

        Route::get('ForceDelete/{id}', 'Accounting\Expense_cont@forcedelete')->name('Expense.ForceDelete');
        Route::get('Restor/{id}', 'Accounting\Expense_cont@restore')->name('Expense.Restor');
        Route::get('View/{id}', 'Accounting\Expense_cont@view')->name('Expense.View');
    });
    Route::get('Convert', function () {
        return view('Acounting.Convert_degrees.Convert_degrees');
    })->name('Convert');

});
Route::prefix('Summary')->group(function () {
    Route::prefix('Customer')->group(function () {
        Route::get('Create', 'Summary_cont@create')->name('Summery.Create');
        Route::post('Create', 'Summary_cont@create')->name('Summery.Create');
        Route::post('Download', 'Summary_cont@download')->name('Summery.Download');
    });

});
Route::prefix('Dashboard')->group(function () {
    Route::get('/', 'Admin\Dashboard_cont@index')->name('Dashboard');
});
Route::prefix('File')->group(function () {
    Route::get('Download/{file}', 'Downloads_cont@download')->name('Downloads');
    Route::get('Deletefile/{id}', 'Downloads_cont@deletefile')->name('Deletefile');
    Route::get('Downloadbackup/{file}', 'Downloads_cont@downloadBackup')->name('Downloadsbackup');
    Route::get('Deletefilebackup/{file}', 'Downloads_cont@deletefileBackup')->name('Deletefilebackup');
    Route::post('Uploadfile/{id}', 'Downloads_cont@uploadfile')->name('Uploadfile');
    Route::post('Changlogo/{id}', 'Downloads_cont@complogoupload')->name('Complogoupload');
});
Route::prefix('Setting')->group(function () {
    Route::prefix('Company')->group(function () {
        Route::get('/', 'Setting_cont@companyindex')->name('Company.Index');
        Route::post('/', 'Setting_cont@companyindex')->name('Company.Index');
    });
    Route::prefix('Mail')->group(function () {
        Route::get('/', 'Setting_cont@mailindex')->name('Mail.Index');
        Route::post('/', 'Setting_cont@mailindex')->name('Mail.Index');
    });
});

Route::group(['prefix' => 'Crm','middleware' => 'auth'],function () {
    Route::prefix('Customer')->group(function () {
        Route::get('Index/{type}', 'Admin\Customer_cont@index')->name('Customer.Index');

        Route::get('Add', 'Admin\Customer_cont@add')->name('Customer.Add');
        Route::post('Add', 'Admin\Customer_cont@add')->name('Customer.Add');

        Route::get('Update/{id}', 'Admin\Customer_cont@update')->name('Customer.Update');
        Route::post('Update/{id}', 'Admin\Customer_cont@update')->name('Customer.Update');



        Route::get('Delete/{id}', 'Admin\Customer_cont@delete')->name('Customer.Delete');
        Route::post('Delete/{id}', 'Admin\Customer_cont@delete')->name('Customer.Delete');
         Route::get('set-active/{id}/{value}', 'Admin\Customer_cont@customerSetIsActive')->name('customerSetIsActive');
        Route::get('ForceDelete/{id}', 'Admin\Customer_cont@forcedelete')->name('Customer.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Customer_cont@restore')->name('Customer.Restor');
        Route::get('View/{id}', 'Admin\Customer_cont@view')->name('Customer.View');
        Route::get('Reset/{id}', 'Admin\Customer_cont@reset')->name('Customer.Reset');
        Route::post('Reset/{id}', 'Admin\Customer_cont@reset')->name('Customer.Reset');

        Route::post('SendEmail/{id}', 'Admin\Customer_cont@sendemail')->name('Customer.SendEmail');
        Route::get('SendEmail/{id}', 'Admin\Customer_cont@sendemail')->name('Customer.SendEmail');

        Route::get('file/dropzone', 'Admin\Customer_cont@dropzone')->name('dropzone');
        Route::post('file/store','Admin\Customer_cont@fileStore')->name('store');
        Route::post('filell/Delete','Admin\Customer_cont@filedelet')->name('filedelete');

        Route::post('import/{gid}','Admin\Customer_cont@import')->name('cu.import');

        Route::post('sendsms/{id}','Admin\Customer_cont@sendsms')->name('Customer.SendSms');
        Route::get('sendsms/{id}','Admin\Customer_cont@sendsms')->name('Customer.SendSms');
    });
    Route::prefix('Employee')->group(function () {
        Route::get('/', 'Admin\Employee_cont@index')->name('Employee.Index');
        Route::get('Add', 'Admin\Employee_cont@add')->name('Employee.Add');
        Route::post('Add', 'Admin\Employee_cont@add')->name('Employee.Add');
        Route::get('Update/{id}', 'Admin\Employee_cont@update')->name('Employee.Update');
        Route::post('Update/{id}', 'Admin\Employee_cont@update')->name('Employee.Update');
        Route::get('UploadProfile/{id}', 'Admin\Employee_cont@updateprofile')->name('UploadProfile');
        Route::post('UploadProfile/{id}', 'Admin\Employee_cont@updateprofile')->name('UploadProfile');
        Route::get('Delete/{id}', 'Admin\Employee_cont@delete')->name('Employee.Delete');
        Route::post('Delete/{id}', 'Admin\Employee_cont@delete')->name('Employee.Delete');
        Route::get('set-active/{id}/{value}', 'Admin\Employee_cont@processSetIsActive')->name('processSetIsActive');
        Route::get('ForceDelete/{id}', 'Admin\Employee_cont@forcedelete')->name('Employee.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Employee_cont@restore')->name('Employee.Restor');
        Route::get('View/{id}', 'Admin\Employee_cont@view')->name('Employee.View');
        Route::get('Reset/{id}', 'Admin\Employee_cont@reset')->name('Employee.Reset');
        Route::post('Reset/{id}', 'Admin\Employee_cont@reset')->name('Employee.Reset');


//        Route::post('Customers/{type}/{id}', 'Admin\Employee_cont@viewcustomer')->name('Employee.viewcustomer');
        Route::get('Customers/{type}/{id}', 'Admin\Employee_cont@viewcustomer')->name('Employee.viewcustomer');
    });
    Route::prefix('Department')->group(function () {
        Route::get('/', 'Admin\Department_cont@index')->name('Department.Index');

        Route::get('Add', 'Admin\Department_cont@add')->name('Department.Add');
        Route::post('Add', 'Admin\Department_cont@add')->name('Department.Add');

        Route::get('Update/{id}', 'Admin\Department_cont@update')->name('Department.Update');
        Route::post('Update/{id}', 'Admin\Department_cont@update')->name('Department.Update');

        Route::get('Delete/{id}', 'Admin\Department_cont@delete')->name('Department.Delete');
        Route::post('Delete/{id}', 'Admin\Department_cont@delete')->name('Department.Delete');
        Route::get('ForceDelete/{id}', 'Admin\Department_cont@forcedelete')->name('Department.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Department_cont@restore')->name('Department.Restor');

    });
    Route::prefix('TaskType')->group(function () {
        Route::get('/', 'Admin\TaskType_cont@index')->name('TaskType.Index');

        Route::get('Add', 'Admin\TaskType_cont@add')->name('TaskType.Add');
        Route::post('Add', 'Admin\TaskType_cont@add')->name('TaskType.Add');

        Route::get('Addajax', 'Admin\TaskType_cont@addajax')->name('TaskType.Addajax');

        Route::get('Update/{id}', 'Admin\TaskType_cont@update')->name('TaskType.Update');
        Route::post('Update/{id}', 'Admin\TaskType_cont@update')->name('TaskType.Update');

        Route::get('Delete/{id}', 'Admin\TaskType_cont@delete')->name('TaskType.Delete');
        Route::post('Delete/{id}', 'Admin\TaskType_cont@delete')->name('TaskType.Delete');
        Route::get('ForceDelete/{id}', 'Admin\TaskType_cont@forcedelete')->name('TaskType.ForceDelete');
        Route::get('Restor/{id}', 'Admin\TaskType_cont@restore')->name('TaskType.Restor');

    });
    Route::prefix('Task')->group(function () {
        Route::get('Index/{type}', 'Admin\Task_cont@index')->name('Task.Index');

        Route::get('Add', 'Admin\Task_cont@add')->name('Task.Add');
        Route::post('Add', 'Admin\Task_cont@add')->name('Task.Add');

        Route::get('Update/{id}', 'Admin\Task_cont@update')->name('Task.Update');
        Route::post('Update/{id}', 'Admin\Task_cont@update')->name('Task.Update');

        Route::get('Delete/{id}', 'Admin\Task_cont@delete')->name('Task.Delete');
        Route::post('Delete/{id}', 'Admin\Task_cont@delete')->name('Task.Delete');

        Route::get('ForceDelete/{id}', 'Admin\Task_cont@forcedelete')->name('Task.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Task_cont@restore')->name('Task.Restor');

        Route::get('View/{id}', 'Admin\Task_cont@view')->name('Task.View');
        Route::post('View/{id}', 'Admin\Task_cont@view')->name('Task.View');

    });
    Route::prefix('State')->group(function () {
        Route::get('/', 'Admin\State_cont@index')->name('State.Index');

        Route::get('Add', 'Admin\State_cont@add')->name('State.Add');
        Route::post('Add', 'Admin\State_cont@add')->name('State.Add');

        Route::get('Update/{id}', 'Admin\State_cont@update')->name('State.Update');
        Route::post('Update/{id}', 'Admin\State_cont@update')->name('State.Update');

        Route::get('Delete/{id}', 'Admin\State_cont@delete')->name('State.Delete');
        Route::post('Delete/{id}', 'Admin\State_cont@delete')->name('State.Delete');
        Route::get('ForceDelete/{id}', 'Admin\State_cont@forcedelete')->name('State.ForceDelete');
        Route::get('Restor/{id}', 'Admin\State_cont@restore')->name('State.Restor');

    });
    Route::prefix('Alert')->group(function () {
        Route::get('Index/{type}', 'Admin\Alert_cont@index')->name('Alert.Index');

        Route::get('Add', 'Admin\Alert_cont@add')->name('Alert.Add');
        Route::post('Add', 'Admin\Alert_cont@add')->name('Alert.Add');

        Route::get('Update/{id}', 'Admin\Alert_cont@update')->name('Alert.Update');
        Route::post('Update/{id}', 'Admin\Alert_cont@update')->name('Alert.Update');

        Route::get('Delete/{id}/{type}', 'Admin\Alert_cont@delete')->name('Alert.Delete');
        Route::post('Delete/{id}/{type}', 'Admin\Alert_cont@delete')->name('Alert.Delete');

        Route::get('ForceDelete/{id}', 'Admin\Alert_cont@forcedelete')->name('Alert.ForceDelete');

        Route::get('Restor/{id}', 'Admin\Alert_cont@restore')->name('Alert.Restor');

        Route::get('View/{id}/{type}', 'Admin\Alert_cont@view')->name('Alert.View');

    });
    Route::prefix('Group')->group(function () {
        Route::get('/', 'Admin\Group_cont@index')->name('Group.Index');

        Route::get('Add', 'Admin\Group_cont@add')->name('Group.Add');
        Route::post('Add', 'Admin\Group_cont@add')->name('Group.Add');

        Route::get('Update/{id}', 'Admin\Group_cont@update')->name('Group.Update');
        Route::post('Update/{id}', 'Admin\Group_cont@update')->name('Group.Update');

        Route::get('Delete/{id}', 'Admin\Group_cont@delete')->name('Group.Delete');
        Route::get('ForceDelete/{id}', 'Admin\Group_cont@forcedelete')->name('Group.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Group_cont@restore')->name('Group.Restor');
        Route::get('View/{id}', 'Admin\Group_cont@view')->name('Group.View');

    });
    Route::prefix('Division')->group(function () {
        Route::get('/', 'Admin\Division_cont@index')->name('Division.Index');

        Route::get('Add', 'Admin\Division_cont@add')->name('Division.Add');
        Route::post('Add', 'Admin\Division_cont@add')->name('Division.Add');

        Route::get('Update/{id}', 'Admin\Division_cont@update')->name('Division.Update');
        Route::post('Update/{id}', 'Admin\Division_cont@update')->name('Division.Update');

        Route::get('Delete/{id}', 'Admin\Division_cont@delete')->name('Division.Delete');
        Route::post('Delete/{id}', 'Admin\Division_cont@delete')->name('Division.Delete');
        Route::get('ForceDelete/{id}', 'Admin\Division_cont@forcedelete')->name('Division.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Division_cont@restore')->name('Division.Restor');
        Route::get('View/{id}', 'Admin\Division_cont@view')->name('Division.View');

    });
    Route::prefix('Role')->group(function () {
        Route::get('Index/{type}', 'Admin\Role_cont@index')->name('Role.Index');

        Route::get('Add/{type}', 'Admin\Role_cont@add')->name('Role.Add');
        Route::post('Add/{type}', 'Admin\Role_cont@add')->name('Role.Add');

        Route::get('Update/{id}/{type}', 'Admin\Role_cont@update')->name('Role.Update');
        Route::post('Update/{id}/{type}', 'Admin\Role_cont@update')->name('Role.Update');

        Route::get('Delete/{id}', 'Admin\Role_cont@delete')->name('Role.Delete');
        Route::post('Delete/{id}', 'Admin\Role_cont@delete')->name('Role.Delete');

    });
    Route::prefix('Permissions')->group(function () {
        Route::get('/', 'Admin\Permissions_cont@index')->name('Permissions.Index');

        Route::get('Add', 'Admin\Permissions_cont@add')->name('Permissions.Add');
        Route::post('Add', 'Admin\Permissions_cont@add')->name('Permissions.Add');

        Route::get('Update/{id}', 'Admin\Permissions_cont@update')->name('Permissions.Update');
        Route::post('Update/{id}', 'Admin\Permissions_cont@update')->name('Permissions.Update');

        Route::get('Delete/{id}', 'Admin\Permissions_cont@delete')->name('Permissions.Delete');
        Route::post('Delete/{id}', 'Admin\Permissions_cont@delete')->name('Permissions.Delete');

    });
    Route::prefix('Ticket')->group(function () {
        Route::get('/', 'Admin\Ticket_cont@index')->name('Ticket.Index');

        Route::get('Add', 'Admin\Ticket_cont@add')->name('Ticket.Add');
        Route::post('Add', 'Admin\Ticket_cont@add')->name('Ticket.Add');

        Route::get('Update/{id}', 'Admin\Ticket_cont@update')->name('Ticket.Update');
        Route::post('Update/{id}', 'Admin\Ticket_cont@update')->name('Ticket.Update');

        Route::get('Delete/{id}', 'Admin\Ticket_cont@delete')->name('Ticket.Delete');
        Route::post('Delete/{id}', 'Admin\Ticket_cont@delete')->name('Ticket.Delete');

        Route::get('View/{id}', 'Admin\Ticket_cont@view')->name('Ticket.View');
        Route::post('View/{id}', 'Admin\Ticket_cont@view')->name('Ticket.View');

    });
    Route::prefix('Article')->group(function () {
        Route::get('Index/{type}', 'Admin\Article_cont@index')->name('Article.Index');

        Route::get('Add', 'Admin\Article_cont@add')->name('Article.Add');
        Route::post('Add', 'Admin\Article_cont@add')->name('Article.Add');

        Route::get('Update/{id}', 'Admin\Article_cont@update')->name('Article.Update');
        Route::post('Update/{id}', 'Admin\Article_cont@update')->name('Article.Update');

        Route::get('Delete/{id}', 'Admin\Article_cont@delete')->name('Article.Delete');
        Route::post('Delete/{id}', 'Admin\Article_cont@delete')->name('Article.Delete');

        Route::get('ForceDelete/{id}', 'Admin\Article_cont@forcedelete')->name('Article.ForceDelete');
        Route::get('Restor/{id}', 'Admin\Article_cont@restore')->name('Article.Restor');
        Route::get('View/{id}', 'Admin\Article_cont@view')->name('Article.View');
        Route::get('EXView/{id}', 'Admin\Article_cont@exview')->name('Article.ExView');

    });
    Route::prefix('Category')->group(function () {
        Route::get('Index', 'Admin\Category_cont@index')->name('Category.Index');

        Route::get('Add', 'Admin\Category_cont@add')->name('Category.Add');
        Route::post('Add', 'Admin\Category_cont@add')->name('Category.Add');

        Route::get('Update/{id}', 'Admin\Category_cont@update')->name('Category.Update');
        Route::post('Update/{id}', 'Admin\Category_cont@update')->name('Category.Update');

        Route::get('Delete/{id}', 'Admin\Category_cont@delete')->name('Category.Delete');
        Route::post('Delete/{id}', 'Admin\Category_cont@delete')->name('Category.Delete');


    });
    Route::prefix('UserFile')->group(function () {
        Route::get('/', 'Admin\UserFile_cont@index')->name('UserFile.Index');

        Route::get('Add', 'Admin\UserFile_cont@add')->name('UserFile.Add');
        Route::post('Add', 'Admin\UserFile_cont@add')->name('UserFile.Add');

        Route::get('Update', 'Admin\UserFile_cont@update')->name('UserFile.Update');
        Route::post('Update', 'Admin\UserFile_cont@update')->name('UserFile.Update');

        Route::get('Delete/{id}', 'Admin\UserFile_cont@delete')->name('UserFile.Delete');
        Route::post('Delete/{id}', 'Admin\UserFile_cont@delete')->name('UserFile.Delete');

       // Route::get('Share', 'Admin\UserFile_cont@sharefile')->name('UserFile.Share');
        Route::post('Share', 'Admin\UserFile_cont@sharefile')->name('UserFile.Share');

        Route::post('Url', 'Admin\UserFile_cont@s3url')->name('UserFile.Url');
        Route::get('Url', 'Admin\UserFile_cont@s3url')->name('UserFile.Url');

        Route::get('testurl', 'Admin\UserFile_cont@testurl')->name('UserFile.testurl');



            Route::get('crdeurl', 'Admin\UserFile_cont@crediurl')->name('CustomerFile.crediurl');
            Route::post('crdeurl', 'Admin\UserFile_cont@crediurl')->name('CustomerFile.crediurl');



    });
    Route::prefix('Note')->group(function () {
        Route::get('/', 'Admin\Note_cont@index')->name('Note.Index');

        Route::get('Add', 'Admin\Note_cont@add')->name('Note.Add');
        Route::post('Add', 'Admin\Note_cont@add')->name('Note.Add');

        Route::get('Update','Admin\Note_cont@update')->name('Notes.Update');
        Route::post('Update','Admin\Note_cont@update')->name('Notes.Update');

        Route::get('Delete/{id}', 'Admin\Note_cont@delete')->name('Notes.Delete');
        Route::post('Delete/{id}', 'Admin\Note_cont@delete')->name('Notes.Delete');
    });

    Route::prefix('Notetype')->group(function () {
        Route::get('/', 'Admin\Notetype_cont@index')->name('Notetype.Index');

        Route::get('Add', 'Admin\Notetype_cont@add')->name('Notetype.Add');
        Route::post('Add', 'Admin\Notetype_cont@add')->name('Notetype.Add');

        Route::get('Update', 'Admin\Notetype_cont@update')->name('Notetype.Update');
        Route::post('Update', 'Admin\Notetype_cont@update')->name('Notetype.Update');

        Route::get('Delete/{id}', 'Admin\Notetype_cont@delete')->name('Notetype.Delete');
        Route::post('Delete/{id}', 'Admin\Notetype_cont@delete')->name('Notetype.Delete');





    });
    Route::prefix('patern')->group(function () {
        Route::get('{pattern}', 'Style_cont@pattern')->name('pattern');
    });
    Route::prefix('help')->group(function () {
        Route::get('getnot', 'Style_cont@getnotification')->name('getnot');
    });

});


Route::get('/home', 'Admin\Dashboard_cont@index')->name('home');
Route::group(['prefix' =>'Customer','middleware' => 'CIslogin'],function () {
    Route::post('logout','Customer\Dashboard_cont@logout')->name('Cu.logout');
    Route::prefix('Dashboard')->group(function () {
        Route::get('/', 'Customer\Dashboard_cont@index')->name('Cu.Dashboard.Index');
    });
    Route::prefix('Invoice')->group(function () {
        Route::get('/', 'Customer\Invoice_cont@index')->name('Cu.Invoice.Index');
        Route::get('View/{id}', 'Customer\Invoice_cont@view')->name('Cu.Invoice.View');
        Route::get('Print/{id}/{type}', 'Customer\Invoice_cont@printinvoice')->name('Cu.Invoice.Download');
    });
    Route::prefix('Task')->group(function () {
        Route::get('/', 'Customer\Task_cont@index')->name('Cu.Task.Index');
        Route::get('View/{id}', 'Customer\Task_cont@view')->name('Cu.Task.View');
        Route::post('View/{id}', 'Customer\Task_cont@view')->name('Cu.Task.View');
    });
    Route::prefix('Customer')->group(function () {
        Route::get('View', 'Customer\Customer_cont@view')->name('Cu.Customer.View');
        Route::post('View', 'Customer\Customer_cont@view')->name('Cu.Customer.View');
    });
    Route::prefix('Ticket')->group(function () {
        Route::get('Add', 'Customer\Ticket_cont@add')->name('Cu.Ticket.Add');
        Route::post('Add', 'Customer\Ticket_cont@add')->name('Cu.Ticket.Add');

        Route::get('Index', 'Customer\Ticket_cont@index')->name('Cu.Ticket.Index');

        Route::get('Add', 'Customer\Ticket_cont@add')->name('Cu.Ticket.Add');
        Route::post('Add', 'Customer\Ticket_cont@add')->name('Cu.Ticket.Add');
        Route::get('Delete/{id}/{type}', 'Customer\Ticket_cont@delete')->name('Cu.Ticket.Delete');
        Route::post('Delete/{id}/{type}', 'Customer\Ticket_cont@delete')->name('Cu.Ticket.Delete');
        Route::get('ForceDelete/{id}', 'Customer\Ticket_cont@forcedelete')->name('Cu.Ticket.ForceDelete');
        Route::get('Restor/{id}', 'Customer\Ticket_cont@restore')->name('Cu.Ticket.Restor');
        Route::get('View/{id}', 'Customer\Ticket_cont@view')->name('Cu.Ticket.View');

    });
    Route::prefix('Accounting')->group(function () {
        Route::get('Make_Acc', 'Customer\Accounting_cont@Make')->name('Cu.Accounting.Add');
        Route::post('Make_Acc', 'Customer\Accounting_cont@Make')->name('Cu.Accounting.Add');
    });
    Route::prefix('Courses')->group(function () {
        Route::get('/', 'Customer\Course_cont@index')->name('Cu.Course.Index');
        Route::post('/', 'Customer\Course_cont@index')->name('Cu.Course.Index');
    });

    Route::prefix('Lesson')->group(function () {
        Route::get('{id}', 'Customer\Lesson_cont@index')->name('Cu.Lesson.Index');
        Route::post('{id}', 'Customer\Lesson_cont@index')->name('Cu.Lesson.Index');
    });

    Route::prefix('UserFile')->group(function () {
        Route::get('crdeurl', 'Admin\UserFile_cont@crediurl')->name('CustomerFile.crediurl');
        Route::post('crdeurl', 'Admin\UserFile_cont@crediurl')->name('CustomerFile.crediurl');
    });
});
Route::get('Customer-login', 'Auth\CustomerLoginController@showLoginForm')->name('Customer.login');
Route::post('Customer-login', ['as'=>'Customer-login','uses'=>'Auth\CustomerLoginController@login'])->name('Customer.login');
Route::prefix('Note')->group(function () {
    Route::get('delete', 'Notification_cont@delete')->name('Note.Delete');
    Route::get('deleteall', 'Notification_cont@deleteall')->name('Note.Deleteall');
    Route::get('makeread', 'Notification_cont@makeread')->name('Note.makeread');
    Route::get('index/{id}', 'Notification_cont@Index')->name('Index.Note');
});

Route::get('Call/{id}', 'Admin\Call_cont@call')->name('Info.call');
Route::prefix('Info')->group(function () {
    Route::prefix('Customer')->group(function () {
        Route::get('index', 'Admin\Call_cont@getcuinfo')->name('Info.Customer');
        Route::get('invoice', 'Admin\Call_cont@getinviceinfo')->name('Info.invoice');
        Route::get('info', 'Admin\Call_cont@getinfo')->name('Info.cu');
        Route::get('note', 'Admin\Call_cont@getnotinfo')->name('Info.note');
        Route::get('update', 'Admin\Call_cont@getupdateinfo')->name('Info.update');
        Route::get('updatesave', 'Admin\Call_cont@getupdatesaveinfo')->name('Info.updatesave');
        Route::get('noteadd', 'Admin\Call_cont@noteadd')->name('Info.noteadd');
        Route::get('task', 'Admin\Call_cont@gettaskinfo')->name('Info.task');
        Route::get('save', 'Admin\Call_cont@save')->name('Info.save');
        Route::get('follow', 'Admin\Call_cont@cufollow')->name('Info.follow');
        Route::get('unfollow', 'Admin\Call_cont@cuunfollow')->name('Info.unfollow');

        Route::get('delete', 'Admin\Call_cont@delete')->name('Info.delete');
        Route::post('add', 'Admin\Call_cont@add')->name('Info.add');
        Route::post('addtype', 'Admin\Call_cont@addnottype')->name('Info.addnottype');
    });
});
Route::get('/clear-cache', function() {
    Artisan::call('npm run watch');
    return "Cache is cleared";
});
Route::get('/allservice', function() {
  return view('Univer.allservice');
});
Route::get('/pusher/{id}', function($id) {
    $user=\App\User::find($id);
    \Illuminate\Support\Facades\Notification::sendNow($user,new \App\Notifications\Msg('fsffvfsgrg'));
    return "Send notification";
});

Route::get('/test', function() {

    $users = \App\User::permission(['Department_الجامعات_Division_خاص_Group_طلبات القبول الجامعي  خاص افتراضي_View','Department_الجامعات_Division_خاص_View','Department_الجامعات_View'])->OrWhere('id',1)->get();

    return $users;

});
Auth::routes();
Route::get('/sender/{id}',function ($id){
event(new \App\Events\AddCuNot('customer add',$id));
return ['sucsess!!!!'];
});

//Route::get('/sender',function (){
//event(new \App\Events\AddCuNot('ahmad alkhatib'));
//return ['sucsessxxxx'];
//});
