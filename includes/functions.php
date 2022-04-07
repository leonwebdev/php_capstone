<?php

/** Our Utility Functions */

/**
 * Escape string for safe output
 *
 * @param string $str
 * @return string
 */
function e(string $str):string
{
    return htmlentities($str, ENT_QUOTES, "UTF-8");
}