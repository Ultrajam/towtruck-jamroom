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
        'version'     => '0.7.0',
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

    return true;
}

/**
 * Smarty function to add the TowTruck button to a template
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

