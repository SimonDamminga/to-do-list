<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';
$route['edit/(:any)'] = 'pages/edit/$1';
$route['delete/(:any)'] = 'pages/delete/$1';
$route['delete-task/(:any)'] = 'pages/deleteTask/$1';
$route['edit-task/(:any)'] = 'pages/editTask/$1';
$route['sort'] = 'pages/sort';
$route['search'] = 'pages/search';
$route['create']  = 'pages/create';
$route['update']  = 'pages/update';
$route['updateTask'] = 'pages/updateTask';
$route['create-tasks'] = 'pages/createTasks';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
