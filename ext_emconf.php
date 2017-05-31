<?php

########################################################################
# Extension Manager/Repository config file for ext "fal_performance".
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Backports of performance improvements for FAL',
	'category' => 'misc',
	'author' => 'Patrick Schriner',
	'author_email' => 'patrick.schriner@diemedialen.de',
	'shy' => '',
	'priority' => '',
	'state' => 'beta',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author_company' => '-',
	'version' => '1.0.0',
	'modify_tables' => 'sys_file_reference',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.27-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
);

?>
