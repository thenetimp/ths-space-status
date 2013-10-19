<?php
/**
 * @package THS Space Status
 * @version 1.0
 */
/*
Plugin Name: THS Space Status
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: Space status is a plugin to toggle the status of a brick and mortar location.
Author: James Andrews
Version: 1.0
*/

function spacestatus_current_status()
{
    // Get the current status of the site.
    $current_status = get_option('space_status_current', 'closed');
    
    return $current_status;
}

