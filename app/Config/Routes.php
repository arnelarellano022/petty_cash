<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
//$routes->get('/', 'Login::login');
$routes->add('/index', 'Auth::index');
$routes->add('/dashboard', 'Auth::dashboard');
$routes->add('/add_register', 'Auth::add_register');
$routes->add('/forgot_password', 'Auth::forgot_password');
$routes->add('/logout', 'Auth::logout');
$routes->add('/logout', 'Auth::logout');

//Users
$routes->add('/users_index', 'Users::users_index');
$routes->add('/add_user', 'Users::add_user');
$routes->add('/change_status', 'Users::change_status');
$routes->add('/change_verify_status', 'Users::change_verify_status');
$routes->add('/edit_user/(:any)', 'Users::edit_user/$1');
$routes->add('/delete_user/(:any)', 'Users::delete_user/$1');

//Roles
$routes->add('/roles_index', 'Roles::roles_index');
$routes->add('/edit_roles/(:any)', 'Roles::edit_roles/$1');
$routes->add('/add_roles', 'Roles::add_roles');
$routes->add('/delete_roles/(:any)', 'Roles::delete_roles/$1');
$routes->add('/access_roles/(:any)', 'Roles::access_roles/$1');
$routes->add('/set_access/', 'Roles::set_access');

//Module
$routes->add('/module_index', 'Module::module_index');
$routes->add('/edit_module/(:any)', 'Module::edit_module/$1');
$routes->add('/add_module', 'Module::add_module');
$routes->add('/delete_module/(:any)', 'Module::delete_module/$1');

//SubModule
$routes->add('/sub_module_index/(:any)', 'Module::sub_module_index/$1');
$routes->add('/edit_sub_module/(:any)', 'Module::edit_sub_module/$1');
$routes->add('/add_sub_module/(:any)', 'Module::add_sub_module/$1');
$routes->add('/delete_sub_module/(:any)', 'Module::delete_sub_module/$1');

//Database Backup
$routes->add('/db_index', 'DB_Backup::db_index');

//Error
$routes->add('/error_404', 'Auth::error_404');

//COMPANY
$routes->add('/company_index', 'Company::company_index');
$routes->add('/edit_company/(:any)', 'Company::edit_company/$1');
$routes->add('/add_company', 'Company::add_company');
$routes->add('/delete_company/(:any)', 'Company::delete_company/$1');

//DEPARTMENT
$routes->add('/department_index', 'Department::department_index');
$routes->add('/edit_department/(:any)', 'Department::edit_department/$1');
$routes->add('/add_department', 'Department::add_department');
$routes->add('/delete_department/(:any)', 'Department::delete_department/$1');

//EMPLOYEE
$routes->add('/employee_index', 'Employee::employee_index');
$routes->add('/view_employee/(:any)', 'Employee::view_employee/$1');
$routes->add('/edit_employee/(:any)', 'Employee::edit_employee/$1');
//$routes->match(['get', 'post'], '/add_employee', 'Employee::add_employee');
$routes->add('/add_employee', 'Employee::add_employee');
$routes->add('/delete_employee/(:any)', 'Employee::delete_employee/$1');

//ACCOUNT
$routes->add('/account_index', 'account::account_index');
$routes->add('/edit_account/(:any)', 'account::edit_account/$1');
$routes->add('/add_account', 'account::add_account');
$routes->add('/delete_account/(:any)', 'account::delete_account/$1');

//PLANTA
$routes->add('/planta_index', 'planta::planta_index');
$routes->add('/edit_planta/(:any)', 'planta::edit_planta/$1');
$routes->add('/add_planta', 'planta::add_planta');
$routes->add('/delete_planta/(:any)', 'planta::delete_planta/$1');

//REQUESTER
$routes->add('/requester_index', 'requester::requester_index');
$routes->add('/edit_requester/(:any)', 'requester::edit_requester/$1');
$routes->add('/add_requester', 'requester::add_requester');
$routes->add('/delete_requester/(:any)', 'requester::delete_requester/$1');

//MANAGEMENT TRANSACTION
$routes->add('/management_transaction_index', 'management_transaction::management_transaction_index');
$routes->add('/edit_management_transaction/(:any)', 'management_transaction::edit_management_transaction/$1');
$routes->add('/view_management_transaction/(:any)', 'management_transaction::view_management_transaction/$1');
$routes->add('/add_management_transaction', 'management_transaction::add_management_transaction');
$routes->add('/delete_management_transaction/(:any)', 'management_transaction::delete_management_transaction/$1');

//CASH VOUCHER
$routes->add('/cash_voucher_index', 'cash_voucher::cash_voucher_index');
$routes->add('/edit_cash_voucher/(:any)', 'cash_voucher::edit_cash_voucher/$1');
$routes->add('/view_cash_voucher/(:any)', 'cash_voucher::view_cash_voucher/$1');
$routes->add('/add_cash_voucher', 'cash_voucher::add_cash_voucher');
$routes->add('/delete_cash_voucher/(:any)', 'cash_voucher::delete_cash_voucher/$1');

//PETTY CASH
$routes->add('/petty_cash_index', 'petty_cash::petty_cash_index');
$routes->add('/edit_petty_cash/(:any)', 'petty_cash::edit_petty_cash/$1');
$routes->add('/add_petty_cash', 'petty_cash::add_petty_cash');
$routes->add('/view_petty_cash/(:any)', 'petty_cash::view_petty_cash/$1');
$routes->add('/delete_petty_cash/(:any)', 'petty_cash::delete_petty_cash/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
