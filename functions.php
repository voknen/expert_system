<?php

function get_header() 
{
    include_once 'header.php';
}

function get_footer()
{
    include_once 'footer.php';
}

function include_scripts()
{
    echo '<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>';
    echo '<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>';
    echo '<script type="text/javascript" src="../js/script.js?version='.time().'"></script>';
} 

function include_stylesheets()
{
    echo '<link rel="stylesheet" href="../css/style.css"/>';
}