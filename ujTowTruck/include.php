<?php
/**
 * Jamroom 5 ujTowTruck module
 *
 * copyright 2013 by Ultrajam - All Rights Reserved
 * http://www.ultrajam.net
 *
 */

// make sure we are not being called directly
defined('APP_DIR') or exit();

/**
 * meta
 */
function ujTowTruck_meta() {
    $_tmp = array(
        'name'        => 'TowTruck',
        'url'         => 'towtruck',
        'version'     => '0.9.0',
        'developer'   => 'Ultrajam, &copy;' . strftime('%Y'),
        'description' => 'Provides TowTruck features to Jamroom.',
        'support'     => 'http://www.jamroom.net/phpBB2',
        'category'    => 'plugins'
    );
    return $_tmp;
}

/**
 * init
 */
function ujTowTruck_init() {

    jrCore_register_module_feature('jrCore','quota_support','ujTowTruck','off');

    // Nice bootstrap docs 
    jrCore_register_module_feature('ujBootstrap','docs','ujTowTruck', true, '3.0.0');
    // Add button link for the docs
    jrCore_register_module_feature('jrCore','tool_view','ujTowTruck','docs',array('ujTowTruck Docs','Documentation for the ujTowTruck module'));

    return true;
}

/**
 * Smarty function to add the TowTruck button to a template
 * Use this in a template such as footer.tpl which will be included in all pages
 * If the function is not on any page the user will be 'offline' on those pages
 */
function smarty_function_ujTowTruck($params,$smarty)
{
    global $_user, $_conf, $_mods;
//fdebug($_conf);
    if (!jrUser_is_logged_in()) {
        return '';
    }
    if ($_mods['ujTowTruck']['module_active'] !== '1') {
        return '';
    }
    if (strlen($_conf['ujTowTruck_collaborators'])) {
		if ($_user['quota_ujTowTruck_allowed'] !== 'on' && !in_array($_user['_user_id'],explode(',',$_conf['ujTowTruck_collaborators']))) {
			return '';
		}
    } elseif ($_user['quota_ujTowTruck_allowed'] !== 'on') {
        return '';
    }

    // add the js and button
    $ttconfig = '';
    $ttconfig .= 'TowTruckConfig_siteName="'.$_conf['jrCore_system_name'].'";';
    $ttconfig .= 'TowTruckConfig_getUserName=function () { return "'.$_user['user_name'].'";};';
    $murl = jrCore_get_module_url('jrProfile');
    $url = "{$_conf['jrCore_base_url']}/{$murl}/image/profile_image/{$_user['_user_id']}/40/crop=square";
    $ttconfig .= 'TowTruckConfig_getUserAvatar=function () { return "'.$url.'";};';
    if ($_conf['ujTowTruck_analytics'] == 'on') {
        $ttconfig .= 'TowTruckConfig_enableAnalytics=true;';
    }
    if (isset($_conf['ujTowTruck_clone_clicks']) && $_conf['ujTowTruck_clone_clicks'] == 'on') {
        $ttconfig .= 'TowTruckConfig_cloneClicks=true;';
    }
    if (isset($_conf['ujTowTruck_autostart']) && $_conf['ujTowTruck_autostart'] == 'on') {
        $button = '';
        $onready = 'TowTruckConfig_on_ready = function () {sendTowTruckURLToServer(TowTruck.shareUrl());};';
    } else {
        //$button = '<button id="start-towtruck" class="form_button btn" type="button" data-end-towtruck-html="End TowTruck">Start TowTruck</button>';
        $button = '<button id="start-towtruck" type="button" class="form_button btn" onclick="TowTruck(this); return false;" data-end-towtruck-html="End TowTruck">Start TowTruck</button>';
        //$ttconfig = '$("#start-towtruck").click(TowTruck);'.$ttconfig;
        $onready = '';
    }
    
    $out = '<script src="https://towtruck.mozillalabs.com/towtruck.js"></script>'.$button.'<script>$(function () { '.$ttconfig.$onready.'  });</script>';

    if (!empty($params['assign'])) {
        $smarty->assign($params['assign'],$out);
        return '';
    }
    return $out;
}

