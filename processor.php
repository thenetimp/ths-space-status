<?php

// Require the wordpress loader.

include_once './../../../wp-load.php'; 

// Get the current status of the site.
$current_status = get_option('space_status_current', 'closed');

// List of valid statuses.
$valid_statuses = array('open','closed');

if(isset($_GET['new_status']))
{
    //  Check if we are passing status message.
    if(in_array($_GET['new_status'], $valid_statuses))
    {
        // If we have a valid status and it is different from our current status we want to update the status.
        if( $_GET['new_status'] != $current_status)
        {
            update_option('space_status_current', $_GET['new_status']);
            $response = array(
                'success' => true,
                'message' => 'Status Updated.'
            );
        }
        else
        {
            $response = array(
                'success' => true,
                'message' => 'No need to update status status is the same.',
                'current_status' => $current_status
            );
        }
    }
    else{
        $response = array(
            'success' => false,
            'message' => 'invalid status type'
        );
    }    
}

// Request for the current status.
if(isset($_GET['status']))
{
    $response = array(
        'success' => true,
        'current_status' => $current_status
    );
}

// Return a json response to the status of the space.
echo json_encode($response);
