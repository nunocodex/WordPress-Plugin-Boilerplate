<?php

defined('__PLUGIN_FILENAME__') or define('__PLUGIN_FILENAME__', 'plugin-name');

/**
 * @param string $string
 * @param string $filename
 * @return string
 */
function replace_filename(string $string, string $filename)
{
    return str_replace(__PLUGIN_FILENAME__, $string, $filename);
}

/**
 * @param string $filename
 */
function rename_filename(string $filename)
{
    rename($filename, replace_filename(__PLUGIN_FILENAME__, $filename));
}

// Rename files
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__)) as $filename) {
    print_r($filename);
}
