<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
class CI_Google {
}
$config['google']['client_id']        = '870642434779-2u8br6qca498d9dfbmbe64ha3tico7jc.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = 'http://localhost/visitlebakasli/pengguna/login';
$config['google']['application_name'] = 'Login to VisitLebak.com';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();
