<?php

/* ====================================================== Common Response ====================================================== */

function responseSuccess()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.success("Data successfully saved!")');
}

function responseFailed()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.error("Data not saved!")');
}

/* ====================================================== API Response ====================================================== */

function responseAPISuccess()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.success("Data syncronized!")');
}

function responseAPIFailed()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.error("Data not syncronized!")');
}

function responseAPIUnreachable()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.warning("Endpoint unreachable!")');
}

/* ====================================================== Auth Response ====================================================== */

function responseWrongEmail()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.error("Wrong email, this email is not registered!")');
}

function responseWrongPassword()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.error("Wrong password!")');
}

function responseLogin()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.info("Successfully login!")');
}

function responseLogout()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.info("You have been logout!")');
}

/* ====================================================== CRUD Response ====================================================== */
function responseCreateSuccess()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.success("Data successfully saved!")');
}

function responseUpdateSuccess()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.success("Data successfully updated!")');
}

function responseDeleteSuccess()
{
    $ci = get_instance();
    $ci->session->set_flashdata('response', 'toastr.warning("Data successfully deleted!")');
}