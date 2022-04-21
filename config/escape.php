<?php

// Escape Functions

/**
 * Sanitize string for output to HTML
 *
 * @param string $str
 * @return string
 */
function esc(string $str):string
{
    return htmlentities($str, ENT_NOQUOTES, "UTF-8");
}

/**
 * Sanitize string for output to HTML Attribute
 *
 * @param string $str
 * @return string
 */
function esc_attr(string $str):string
{
    return htmlentities($str, ENT_QUOTES, "UTF-8");

}

/**
 * Return raw data
 *
 * @param mixed $var
 * @return mixed
 */
function raw(mixed $var):mixed
{
    return $var;
}

/**
 * Escape filtered HTML
 *
 * @param string $str
 * @return string
 */
function html(string $str):string 
{
    $allowed = [
        '<p>',
        '<br>',
        '<img>',
        '<strong>',
        '<em>',
        '<h1>',
        '<h2>',
        '<h3>',
        '<h4>',
        '<h5>',
        '<h6>',
    ];
    $stripped = strip_tags($str, $allowed);
    $entities = htmlentities($stripped, ENT_QUOTES, "UTF-8");
    $clean = htmlspecialchars_decode($entities, ENT_NOQUOTES);

    return $clean;
}