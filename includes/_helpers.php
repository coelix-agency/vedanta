<?php
defined( 'ABSPATH' ) || exit;

/**
 * Phone Strip Tags
 * @phone_replace()
 * @str
 */
function phone_replace($str) {
    $out = preg_replace('/[^0-9]/', '', $str);
    return $out;
}