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

    // TowTruck Collaborators
    $_tmp = array(
        'name'     => 'collaborators',
        'type'     => 'text',
        'default'  => '',
        'validate' => 'printable',
        'label'    => 'Collaborator ids',
        'help'     => 'Enter the user id (or comma separated list of user ids) who you want to use TowTruck with. You would most likely remove them from this setting after you have finished.',
        'section'  => 'collaborators',
        'order'    => 1
    );
    jrCore_register_setting('ujTowTruck',$_tmp);
    
    // TowTruck Autostart
//     $_tmp = array(
//         'name'     => 'autostart',
//         'default'  => 'off',
//         'type'     => 'checkbox',
//         'validate' => 'onoff',
//         'required' => 'on', 
//         'label'    => 'autostart',
//         'help'     => 'Enabling this option will start the TowTruck session automatically for the user and hide the button.',
//         'section'  => 'collaborators',
//         'order'    => 2
//     );
//     jrCore_register_setting('ujTowTruck',$_tmp);
    
    // TowTruck Analytics
    $_tmp = array(
        'name'     => 'analytics',
        'default'  => 'on',
        'type'     => 'checkbox',
        'validate' => 'onoff',
        'required' => 'on', 
        'label'    => 'analytics',
        'help'     => 'Enabling this option will send usage data to Mozilla. They need that usage data to be able to improve TowTruck for you, so please leave it on at least during the alpha/beta phase.',
        'section'  => 'general settings',
        'order'    => 3
    );
    jrCore_register_setting('ujTowTruck',$_tmp);

    // TowTruck Clone Clicks
//     $_tmp = array(
//         'name'     => 'clone_clicks',
//         'default'  => 'off',
//         'type'     => 'checkbox',
//         'validate' => 'onoff',
//         'required' => 'on', 
//         'label'    => 'clone clicks',
//         'help'     => 'Enabling this option will clone clicks in the other user\'s browser instead of just showing the clicks. Note: This is an experimental feature which may be removed.',
//         'section'  => 'general settings',
//         'order'    => 4
//     );
//     jrCore_register_setting('ujTowTruck',$_tmp);

    return true;
}

