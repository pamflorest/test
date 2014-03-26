<?php
/**
 * Plugin Name: Pam plugin
 * Plugin URI: http://localhost:8888/
 * Description: Weather Plugin.
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Pamela Flores
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */

function mi_plugin_menu(){
	//add_options_page($titulo_pagina, $titulo_menu, $alcance_permisos, $menu_slug, $funcion_callback);

    add_menu_page('Mi plugin','Mi plugin','read','mis_opciones','opciones_plugin');
}
//y ahora añadimos la función mi_menu_opciones al menú de administración
add_action('admin_menu','mi_plugin_menu');

//esta será la función callback para la función mi_plugin_menu
function opciones_plugin(){

	$cities = array('London', 'Tokyo', 'Mexico');

	foreach ($cities as $city) {
		$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='. $city .'&mode=json&units=metric');
		$data = json_decode($json);

		$oks = $data->weather;

		echo "<p>Ciudad: {$data->name} &nbsp; Temperature: {$data->main->temp}°C Desc: {$oks[0]->description}</p>";


		/****PARA GUARDAR EN LA BD ****/
		global $wpdb;

		// funcion que guarde en la tabla weather
		$exist = $wpdb->get_row('SELECT id FROM weather WHERE wid ='. $data->id);
		if (!$exist){/***si no existe ***/

			$exito = $wpdb->insert( 'weather',
				array(
					'wid' => $data->id,
					'ciudad' => $data->name,
					'temperatura'=>$data->main->temp
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
			'ciudad' => $data->name,
			'temperatura'=>$data->main->temp
		),
		array( 'wid' => $data->id ),
		array(
			'%s',	// value1
			'%s',
		),
		array( '%s' ) );

	}
}



?>