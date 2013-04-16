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

//------------------------------
// docs (view the docs)
//------------------------------
function view_ujTowTruck_docs($_post,$_user,$_conf)
{
    jrCore_page_title('ujTowTruck Docs');
    $out = ujBootstrap_read_docs($_post,$_user,$_conf);
    return $out;
}