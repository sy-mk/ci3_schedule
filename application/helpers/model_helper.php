<?php

function checkAccess()
{
    $ci = get_instance();
    $ci->load->model('M_Menu');

    return $ci->M_Menu->getUserAccess();
}

function getAvatar()
{
    $ci = get_instance();
    $ci->load->model('M_Menu');

    return $ci->M_Menu->getUserAvatar();
}

function getNoID()
{
    $ci = get_instance();
    $ci->load->model('M_Menu');
    $noID = $ci->M_Menu->getUserdetail();

    return $noID['id_user'];
}

function getDivisi()
{
    $ci = get_instance();
    $ci->load->model('M_Menu');
    $divisi = $ci->M_Menu->getUserdetail();

    return $divisi['divisi'];
}
