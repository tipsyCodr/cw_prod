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
$route['default_controller'] = 'WebController/index';

//problematic
$route['about_us'] = 'WebController/about';

$route['home'] = 'WebController/home';
$route['services'] = 'WebController/services';
$route['social'] = 'WebController/social';
$route['matrimonial'] = 'WebController/matrimonial';
$route['profile'] = 'UserController/index';
$route['login'] = 'WebController/login';


//Login & Auth
$route['splash-login'] = 'LoginController/authenticate';
$route['phone-login'] = 'LoginController/phoneRegister';
$route['google-auth'] = 'LoginController/googleAuthenticate';

//test



// User 
// Verification
$route['membership'] = 'UserController/verifyForm';
$route['membership/verify'] = 'UserController/verifySave';

$route['profile-pic'] = 'UserController/profilePic';
$route['profile-pic/update'] = 'UserController/updateProfilePic';
$route['update'] = 'UserController/updateDetails';


//Subpages
//Services
$route['services/post/job'] = 'ServiceController/postJobForm';
$route['services/post/job/store'] = 'ServiceController/postJobSave';
$route['services/post/business'] = 'ServiceController/postBusinessForm';
$route['services/post/business/store'] = 'ServiceController/postBusinessSave';


//Social
$route['social/all-post'] = 'SocialController/getAllPosts';
$route['social/members'] = 'SocialController/getAllMembers';
$route['social/post/(:num)'] = 'SocialController/view/$1';
$route['social/post/like/(:num)/(:num)'] = 'SocialController/toggleLike/$1/$2';

$route['social/post/comment/add'] = 'SocialController/add_comments';

//User registration
$route['register/page'] = 'WebController/registerForm';
$route['register/submit'] = 'UserController/store';

//Matrimonial Registration
$route['matrimonial/search'] = 'MatrimonialController/getProfiles';
$route['matrimonial/profile/(:num)'] = 'MatrimonialController/getFullProfile/$1';
$route['matrimonial/query'] = 'MatrimonialController/queryProfiles';
$route['matrimonial/register/page'] = 'WebController/matrimonialForm';
$route['matrimonial/register/submit'] = 'UserController/matrimonialRegisterForm';
$route['matrimonial/request/send'] = 'MatrimonialController/sendRequest';
$route['matrimonial/request/accept'] = 'MatrimonialController/acceptRequest';
$route['matrimonial/request/reject'] = 'MatrimonialController/rejectRequest';
$route['matrimonial/requests/get'] = 'MatrimonialController/fetchRequest';
$route['kundli/form'] = "MatrimonialController/kundliForm";
$route['kundli/result'] = "MatrimonialController/kundliResult";

//Subpages

//Backend Routes
$route['authenticate'] = 'LoginController/authenticate';
$route['logout'] = 'LoginController/logout';

//Backend Routes Admin Panel
$route['admin'] = 'Backend/index';
$route['cw_yaris3556/admin/dashboard'] = 'AdminController/index';


//user
$route['cw_yaris3556/admin/users/unverified/list'] = 'AdminController/unverifiedUsers';
$route['cw_yaris3556/admin/users/verified/list'] = 'AdminController/verifiedUsers';
$route['cw_yaris3556/admin/users/ban/(:num)'] = 'AdminController/banUser/$1';
$route['cw_yaris3556/admin/users/unban/(:num)'] = 'AdminController/unBanUser/$1';

$route['cw_yaris3556/admin/requests/list/pending'] = 'AdminController/fetchPendingRequests';
$route['cw_yaris3556/admin/requests/list/processed'] = 'AdminController/fetchProcessedRequests';

$route['cw_yaris3556/admin/requests/approve/(:num)'] = 'AdminController/approveMemberShip/$1';
$route['cw_yaris3556/admin/requests/reject/(:num)'] = 'AdminController/rejectMemberShip/$1';
//user



//matrimonials
$route['cw_yaris3556/admin/matrimonial/list'] = 'AdminController/matrimonialProfiles';
$route['cw_yaris3556/admin/matrimonial/view/(:num)'] = 'AdminController/viewMatrimonialProfiles/$1';

$route['cw_yaris3556/admin/matrimonial/profile/suspend/(:num)'] = 'AdminController/suspendMatrimonialProfile/$1';
$route['cw_yaris3556/admin/matrimonial/profile/enable/(:num)'] = 'AdminController/enableMatrimonialProfile/$1';
//matrimonials


//social post
$route['cw_yaris3556/admin/posts/list'] = 'AdminController/postList';
$route['cw_yaris3556/admin/post/view/(:num)'] = 'AdminController/viewPost/$1';
$route['cw_yaris3556/admin/post/ban/(:num)'] = 'AdminController/banPost/$1';
$route['cw_yaris3556/admin/post/unban/(:num)'] = 'AdminController/unBanPost/$1';
$route['cw_yaris3556/admin/comment/delete/(:num)'] = 'AdminController/deleteComment/$1';
$route['cw_yaris3556/admin/comment/restore/(:num)'] = 'AdminController/restoreComment/$1';
//social post


//account management
$route['cw_yaris3556/admin/login'] = 'Backend/LoginAdminForm';
$route['cw_yaris3556/admin/login/authorize'] = 'Backend/loginAsAdmin';
$route['cw_yaris3556/admin/create'] = 'AdminController/createAdmin';
$route['cw_yaris3556/admin/create/store'] = 'AdminController/addAdmin';

//Just for testing. Delete on production
$route['cw_yaris3556/admin/session'] = 'WebController/getSession';


//Old Routes ==============================================================================================================================
// login route 
$route['login-old'] = 'logincontroller/Login_Controller';
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
$route['get_all_city'] = 'joblistingcontrollers/JobListController/get_all_cities';

//matrimonial section
$route['matrimonial_form'] = 'matrimonialcontrollers/MatriMonialController';
$route['matrimonial_form_submit'] = 'matrimonialcontrollers/MatriMonialController/submit_form';
$route['matrimonial-old'] = 'matrimonialcontrollers/MatriMonialController/matrimonial';
$route['matrimonial_find_match'] = 'matrimonialcontrollers/MatriMonialController/find_match';
$route['matrimonial_find_match_result'] = 'matrimonialcontrollers/MatriMonialController/find_match_result';
$route['matromonial_profile/(:num)'] = 'matrimonialcontrollers/MatriMonialController/matromonial_profile/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
