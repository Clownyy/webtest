<?php

function check_already_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('status');
    if($user_session){
        redirect('dashboard/country');
    }
}
function check_not_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('status');
    if(!$user_session){
        redirect('auth/login');
    }
}
?>