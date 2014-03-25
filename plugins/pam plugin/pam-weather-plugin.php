<?php
/**
 * Plugin Name: Pam plugin
 * Plugin URI: http://localhost:8888/
 * Description: A brief description of the Plugin.
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Pamela Flores
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */

function mi_plugin_menu(){
	//add_options_page($titulo_pagina, $titulo_menu, $alcance_permisos, $menu_slug, $funcion_callback);

    add_menu_page('Mi plugin','Mi plugin','read','mis_opciones','opciones_plugin', '');
}
//y ahora añadimos la función mi_menu_opciones al menú de administración
add_action('admin_menu','mi_plugin_menu');

//esta será la función callback para la función mi_plugin_menu
function opciones_plugin(){
	//http://api.openweathermap.org/data/2.5/weather?q=Kyoto,jp
	$json1 = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=London,uk&mode=json&units=metric');
	$data1 = json_decode($json1);

	$json2 = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Tokyo,jp&mode=json&units=metric');
	$data2 = json_decode($json2);

	$json3 = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Mexico&mode=json&units=metric');
	$data3 = json_decode($json3);

	echo "<p>Ciudad: {$data1->name} &nbsp; Temperature: {$data1->main->temp}°C</p>";

	echo "<p>Ciudad: {$data2->name} &nbsp; Temperature: {$data2->main->temp}°C</p>";

	echo "<p>Ciudad: {$data3->name} &nbsp; Temperature: {$data3->main->temp}°C</p>";


	/****PARA GUARDAR EN LA BD ****/
	global $wpdb;

	// funcion que guarde en la tabla weather
	$exist = $wpdb->get_row('SELECT id FROM weather WHERE wid ='. $data2->id);
	if (!$exist){/***si no existe ***/

		$exito = $wpdb->insert( 'weather',
			array(
				'wid' => $data2->id,
				'ciudad' => $data2->name,
				'temperatura'=>$data2->main->temp
			),
			array(
				'%s',
				'%s',
				'%s',
			)
		);
	}

	/***si ya existe ***/
	$wpdb->update('weather',
	array(
		'ciudad' => $data2->name,
		'temperatura'=>$data2->main->temp
	),
	array( 'wid' => $data2->id ),
	array(
		'%s',	// value1
		'%s',
	),
	array( '%s' ) );
}

?>