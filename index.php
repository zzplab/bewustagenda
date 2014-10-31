<?php
/**
 * Bewust Agenda API > json / xml download agenda Bewust Nederland.
 *
 * @copyright   Copyright (c) 2014, ZZPstudio <erwin@zzplab.nl>
 */
require 'bewustagenda/api.php';
$config = [
'domein'   => ''
,'api_id'   => ''
,'api_key'  => ''
,'data_type' => ''
,'api_url'  => ''
];
$bn = new bewustagenda\api($config);
$bn->set_filter('datum','all');
$output = $bn->get_agenda();
echo $output;
?>
