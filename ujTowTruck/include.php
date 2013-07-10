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
        'version'     => '0.8.0',
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
    jrCore_register_module_feature('ujBootstrap','docs','ujImagePicker', true, '3.0.0');
    // Add button link for the docs
    jrCore_register_module_feature('jrCore','tool_view','ujImagePicker','docs',array('ujImagePicker Docs','Documentation for the ujImagePicker module'));

    return true;
}

/**
 * Smarty function to add the TowTruck button to a template
 * Use this in a template such as footer.tpl which will be included in all pages
 * If the function is not on any page the user will be 'offline' on those pages
 */
function smarty_function_ujTowTruck($params,$smarty)
{
    global $_user, $_conf;
    if ($_user['quota_ujTowTruck_allowed'] !== 'on') {
        return '';
    }

    // add the js and button
    $ttconfig = '';
    if ($_conf['ujTowTruck_analytics'] == 'on') {
        $ttconfig .= 'TowTruckConfig_enableAnalytics=true;';
    }
    if ($_conf['ujTowTruck_clone_clicks'] == 'on') {
        $ttconfig .= 'TowTruckConfig_cloneClicks=true;';
    }
    $out = '<script src="https://towtruck.mozillalabs.com/towtruck.js"></script><button id="towtruck-btn" class="form_button btn">Start TowTruck</button><script>$(function () { $("#towtruck-btn").click(TowTruck); });'.$ttconfig.'</script>';

    if (!empty($params['assign'])) {
        $smarty->assign($params['assign'],$out);
        return '';
    }
    return $out;
}

