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


$config['google_client_id']="689115102196-j2bq65kjsphj2e4oamuvtnspgnjn41i0.apps.googleusercontent.com";
$config['google_client_secret']="Wy90zf1hGvMjVklVO-YJogJP";
$config['google_redirect_url']=base_url().'Google_user_Authentication';