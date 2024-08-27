<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';





// $route['home'] = 'landing_page_controllers/LandingPagesController';

// login route 
$route['login'] = 'logincontroller/Login_Controller';
$route['logout'] = 'logincontroller/Logout_Controller';
//landing page

$route['about'] = 'landingpagecontroller/about';
$route['contact'] = 'landingpagecontroller/contact';

//User registration form
$route['user_registration'] = 'userregistrationcontrollers/UserRegController';
$route['user_registration_submit'] = 'userregistrationcontrollers/UserRegController/register_user';

//business client view section
$route['business_listing_form_submit'] = 'businesslistingcontrollers/BusinessListController/business_listing';
$route['business_listing_form'] = 'businesslistingcontrollers/BusinessListController';
$route['business'] = 'businesslistingcontrollers/BusinessListController/get_all_business_list';

// Blog Routes 
$route['blog'] = 'blogcontrollers/BlogController';
$route['add_blog'] = 'blogcontrollers/BlogController/add_blog';
$route['blog_details/(:num)'] = 'blogcontrollers/BlogController/blog_details/$1';
$route['increaseLike'] = 'blogcontrollers/BlogController/increseLike';
$route['add_comments'] = 'blogcontrollers/BlogController/add_comments';

//Job section
$route['job_listing_form_submit'] = 'joblistingcontrollers/JobListController/job_listing';
$route['job_listing_form'] = 'joblistingcontrollers/JobListController';
$route['job'] = 'joblistingcontrollers/JobListController/get_all_job_list';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//matrimonial section
$route['matrimonial_form'] = 'matrimonialcontrollers/MatriMonialController';
$route['matrimonial_form_submit'] = 'matrimonialcontrollers/MatriMonialController/submit_form';
$route['matrimonial'] = 'matrimonialcontrollers/MatriMonialController/matrimonial';
$route['matrimonial_find_match'] = 'matrimonialcontrollers/MatriMonialController/find_match';
$route['matrimonial_find_match_result'] = 'matrimonialcontrollers/MatriMonialController/find_match_result';
$route['matromonial_profile/(:num)'] = 'matrimonialcontrollers/MatriMonialController/matromonial_profile/$1';


// echo time();