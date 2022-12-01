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
$routes->add('/add_employee', 'Employee::add_employee');
$routes->add('/delete_employee/(:any)', 'Employee::delete_employee/$1');


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
