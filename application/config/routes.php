<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['404_override'] = 'site/notfound';
$route['translate_uri_dashes'] = FALSE;

$route['admin-login'] = 'admin/login/login';
$route['logout'] = 'admin/admin/exit';
$route['dashboard'] = 'admin/dashboard/dashboard';

/**********admin screen routes***********************/
$route['manage-product-category/add']['GET'] = 'admin/category/categorymgmt/index';
$route['manage-product-category/list']['GET']='admin/category/categorymgmt/list';
$route['manage-product-category/edit/(:any)']['GET']='admin/category/categorymgmt/edit/$1';

$route['manage-product/add']['GET'] = 'admin/product/productmgmt/index';
$route['manage-product/list']['GET']='admin/product/productmgmt/list';
$route['manage-product/edit/(:any)']['GET']='admin/product/productmgmt/edit/$1';

$route['manage-home-page-banners/add']['GET'] = 'admin/global/globalmgmt/index';

/**********admin screen routes***********************/


/*******site routes*********/

$route['home']['GET'] = 'site/site/index';

$route['about-me']['GET'] = 'site/site/about';
$route['contact']['GET'] = 'site/site/contact';
$route['register']['GET'] = 'site/site/register';
$route['reset-password']['GET'] = 'site/site/forgotpass';
$route['login']['GET'] = 'site/site/login';
$route['signout']['GET'] = 'site/site/logout';
$route['my-account']['GET'] = 'site/site/myaccount';
$route['my-account/edit-password']['GET'] = 'site/site/editmypassword';

$route['my-cart'] = 'site/cart/mycart';
$route['terms-and-conditions']['GET'] = 'site/site/terms';
$route['privacy-policy']['GET'] = 'site/site/privacy';

$route['reset-password/(:any)']['GET'] = 'site/site/resetpassword';

$route['art-category/details/(:any)/(:any)']['GET'] = 'site/site/artcategorydetails';
$route['art/details/(:any)/(:any)/(:any)']['GET'] = 'site/site/artdetails';

//$route['blog/joe'] = 'site/site/hamperdetails/2';

$route['manage-client-say/add']['GET'] = 'admin/clientsay/clientsaymgmt/index';
$route['manage-client-say/list']['GET']='admin/clientsay/clientsaymgmt/list';
$route['manage-client-say/edit/(:any)']['GET']='admin/clientsay/clientsaymgmt/edit/$1';




/*******site routes*********/




/**********API routes***********************/


$route['add-product-category']['POST']='api/categories/category/add';
$route['update-product-category']['POST']='api/categories/category/update';

$route['add-product']['POST']='api/products/product/add';
$route['update-product']['POST']='api/products/product/update';




$route['add-users']['POST']='api/users/user/add';
$route['update-users']['POST']='api/users/user/update';
$route['update-password']['POST']='api/users/user/updatepassword';

$route['mail-check-send-mail']['POST']='api/users/user/mailchecksendmail';

$route['resetpassword']['POST']='api/users/user/resetpassword';

$route['add-home-banners']['POST']='api/global/globals/add';

$route['add-client-say']['POST']='api/clientsay/clientsay/add';
$route['update-client-say']['POST']='api/clientsay/clientsay/update';


/**********API routes***********************/