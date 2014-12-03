<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// $appended_lang = "(?:[a-zA-Z]{2}/?)?"; 
// $prepended_lang = "(?:[a-zA-Z]{2}/)?"; 

$route['default_controller'] = "admin";

// $route["$appended_lang"] = "home";


$route['404_override'] = '';

$route['admin'] = 'admin';
$route['admin/script'] = 'admin/script';
$route['admin/users'] = 'admin/users';
$route['admin/projects'] = 'admin/projects';
$route['admin/alert'] = 'admin/checkPropertyAlert';
$route['admin/content'] = 'admin/content';
$route['admin/offices'] = 'admin/offices';
$route['admin/offices/new'] = 'admin/newOffice';
$route['admin/content/new'] = 'admin/addContent';
$route['admin/deletecontent/(:any)'] = 'admin/deleteContent';
$route['admin/editcontent/(:any)'] = 'admin/editContent';

$route['admin/newsletter/create'] = 'admin/createNewsletter';


$route['admin/sendall'] = 'admin/newsletterSend';

$route['admin/properties'] = 'admin/properties';
$route['admin/propertyalert'] = 'admin/propertyalert';
$route['admin/newsletter'] = 'admin/newsletter';
$route['admin/auctions'] = 'admin/auction';
$route['admin/courses'] = 'admin/courses';
$route['admin/courses/new'] = 'admin/newCourse';
$route['admin/units/new'] = 'admin/newUnit';
$route['admin/courses/(:any)'] = 'admin/showCourse';
$route['admin/offices/(:any)'] = 'admin/showOffice';
$route['admin/units/(:any)'] = 'admin/showUnit';

$route['admin/auctions/new'] = 'admin/NewAuction';
$route['admin/vacancies/new'] = 'admin/NewVacancy';
$route['admin/vacancies'] = 'admin/vacancies';
$route['admin/units'] = 'admin/units';
$route['admin/auctions/(:any)'] = 'admin/showAuction';
$route['admin/properties/(:any)'] = 'admin/showProperty';
$route['admin/vacancies/download/(:any)'] = 'admin/downloadcv';
$route['admin/vacancies/(:any)'] = 'admin/showVacancy';
$route['admin/projects/(:any)'] = 'admin/showProject';

$route['admin/users/new'] = 'admin/createUser';
$route['admin/projects/new'] = 'admin/createProject';
$route['admin/checkpasswordchange.php'] = 'admin/checkpasswordchange';
$route['admin/users/(:any)'] = "admin/userProfile";




// $route['mail'] = 'home/sendMail';




//$route['admin/authenticate'] = 'admin/authenticate';

// $route['logout'] = 'home/logout';
// $route["$appended_lang/logout"] = "home/logout";



// $route['validate/(:any)'] = "home/validateToken";
// $route['subscribeuser'] = 'home/subscribeuser';
// $route['insertPropertyAlert'] = "home/insertPropertyAlert";

// $route['register'] = 'home/register';
// $route["$appended_lang/register"] = "home/register";


// $route['profile'] = 'home/profile';
// $route["$appended_lang/profile"] = "home/profile";


// $route['shareProperty'] = 'home/shareProperty';
// $route["$appended_lang/shareProperty"] = "home/shareProperty";


// $route['viewAllProperties'] = 'home/viewAllProperties';
// $route["$appended_lang/viewAllProperties"] = "home/viewAllProperties";

// $route['viewAllProperties/(:any)'] = 'home/viewAllProperties';
// $route["$appended_lang/viewAllProperties/(:any)"] = "home/viewAllProperties";

// $route['propertyDetails'] = 'home/propertyDetails';
// $route["$appended_lang/propertyDetails"] = "home/propertyDetails";

// $route['propertyDetails/(:any)'] = 'home/propertyDetails';
// $route["$appended_lang/propertyDetails/(:any)"] = "home/propertyDetails";

// $route['careers'] = 'home/careers';
// $route["$appended_lang/careers"] = "home/careers";

// $route['uploadCV'] = 'home/uploadCV';
// $route["$appended_lang/uploadCV"] = "home/uploadCV";

// $route['uploadCV/(:any)'] = 'home/uploadCV';
// $route["$appended_lang/uploadCV/(:any)"] = "home/uploadCV";

// $route['joinUs'] = 'home/joinUs';
// $route["$appended_lang/joinUs"] = "home/joinUs";


// $route['marketIndex'] = 'home/marketIndex';
// $route["$appended_lang/marketIndex"] = "home/marketIndex";

// $route['auction'] = 'home/auction';
// $route["$appended_lang/auction"] = "home/auction";


// $route['compareProperties'] = 'home/compareProperties';
// $route["$appended_lang/compareProperties"] = "home/compareProperties";

// $route['trainingCenter'] = 'home/trainingCenter';
// $route["$appended_lang/trainingCenter"] = "home/trainingCenter";

// $route['getDistricts'] = 'home/getDistricts';
// $route['getPropertyTypes'] = 'home/getPropertyTypes';
// $route['displayOffice'] = 'home/displayOffice';
// $route['displayMap'] = 'home/displayMap';

// $route['forgotPassword'] = 'home/forgotPassword';
// $route["$appended_lang/forgotPassword"] = "home/forgotPassword";

// $route['resetpassword/(:any)'] = 'home/resetpassword';
// $route["$appended_lang/resetpassword/(:any)"] = "home/resetpassword";

// $route['offices'] = 'home/offices';
// $route["$appended_lang/offices"] = "home/offices";

// $route['about'] = 'home/about';
// $route["$appended_lang/about"] = "home/about";

// $route['franchise'] = 'home/franchise';
// $route["$appended_lang/franchise"] = "home/franchise";

// $route['insertContact'] = 'home/insertContact';
// $route["$appended_lang/insertContact"] = "home/insertContact";

// $route['insertFavorite'] = 'home/insertFavorite';
// $route["$appended_lang/insertFavorite"] = "home/insertFavorite";

// $route['deleteFavorite'] = 'home/deleteFavorite';
// $route["$appended_lang/deleteFavorite"] = "home/deleteFavorite";

// $route["$appended_lang/home"] = "home";
// $route["createExcel"] = "home/createExcel";


// //Temporary
// $route["newsletterSingle"] = "home/newsletterSingle";
// $route["newsletterBanner"] = "home/newsletterBanner";
// $route["newsletterProperties"] = "home/newsletterProperties";


// $route['getFeaturedProperties'] = 'home/getFeaturedProperties';


/* End of file routes.php */
/* Location: ./application/config/routes.php */