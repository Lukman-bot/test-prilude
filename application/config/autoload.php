<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session', 'form_validation', 'database');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'dateindo_helper', 'lukman_helper');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Mod_menu' => 'menu', 'Mod_admin' => 'admin');
