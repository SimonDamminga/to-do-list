<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';
$route['edit/(:any)'] = 'pages/edit/$1';
$route['delete/(:any)'] = 'pages/delete/$1';
$route['create']  = 'pages/create';
$route['update']  = 'pages/update';
$route['create-tasks'] = 'pages/createTasks';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
