<?php

function loggedSession()
{
    $ci = get_instance();
    return $ci->session->userdata('user_scheduler');
}

function isLoggedIn()
{
    if (!loggedSession()) {
        redirect('auth');
    }
}

function loggedIn()
{
    if (loggedSession()) {
        redirect('main');
    }
}

function getUriSegment($segment)
{
    $ci = get_instance();
    return $ci->uri->segment($segment);
}

function pageName()
{
    $uri1 = getUriSegment(1);
    $uri2 = getUriSegment(2);

    if ($uri2) {
        return [$uri1, $uri2];
    }

    return [$uri1];
}

function pageList()
{
    $page_category = ["schedule"];
    $page = ["main", "operational_vehicle", "vehicle_list"];
    $pages = [];

    foreach ($page_category as $pc) {
        $pages[$pc] = [
            "li" => "",
            "a" => "",
        ];
    }

    foreach ($page as $p) {
        $pages[$p] =  ["a" => ""];
    }

    return $pages;
}

function activePage()
{
    $page = pageList();
    $segment = pageName();

    foreach ($page as $key => $value) {
        if (count($segment) === 1 && $key === $segment[0]) {
            $page[$segment[0]] = ["a" => "active"];
        } elseif (count($segment) === 2 && $key === $segment[1]) {
            $page[$segment[0]] = [
                "li" => "menu-is-opening menu-open",
                "a" => "active"
            ];
            $page[$segment[1]] = ["a" => "active"];
        }
    }
    return $page;
}

function page($page, $data)
{
    $ci = get_instance();

    $data['page'] = activePage();

    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/navbar');
    $ci->load->view('templates/sidebar', $data);
    $ci->load->view($page, $data);
    $ci->load->view('templates/footer', $data);
}

function dtDetailButton($link)
{
    return "<a href='$link' class='btn btn-primary cs-wf' data-toggle='tooltip' data-placement='top' title='View'><i class='fa fa-info'></i></a>";
}

function dtEditButton($link)
{
    return "<a href='$link' class='btn btn-primary cs-wf' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit'></i></a>";
}

function getUserAgent()
{
    if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'iphone')) {
        return TRUE;
    }
    return FALSE;
}

function isMobileResolution()
{
    $ci = get_instance();
    $screen_width = (int)$ci->session->userdata('screen_width');
    $screen_height = (int)$ci->session->userdata('screen_height');
    if (min($screen_width, $screen_height) < 768) {
        return TRUE;
    }
    return FALSE;
}
