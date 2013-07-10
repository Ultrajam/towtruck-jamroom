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
 * ujTowTruck_config
 */
function ujTowTruck_config()
{
    // TowTruck Analytics
    $_tmp = array(
        'name'     => 'analytics',
        'default'  => 'off',
        'type'     => 'checkbox',
        'validate' => 'onoff',
        'required' => 'on', 
        'label'    => 'analytics',
        'help'     => 'Enabling this option will send usage data to Mozilla.',
        'section'  => 'general settings',
        'order'    => 2
    );
    jrCore_register_setting('ujTowTruck',$_tmp);

    // TowTruck Clone Clicks
    $_tmp = array(
        'name'     => 'clone_clicks',
        'default'  => 'off',
        'type'     => 'checkbox',
        'validate' => 'onoff',
        'required' => 'on', 
        'label'    => 'clone clicks',
        'help'     => 'Enabling this option will clone clicks in the other user\'s browser instead of just showing the clicks. Note: This is an experimental feature which may be removed.',
        'section'  => 'general settings',
        'order'    => 2
    );
    jrCore_register_setting('ujTowTruck',$_tmp);

    return true;
}

