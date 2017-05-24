<?php

class BreedsTableSeeder extends Seeder {
	public function run() {
		DB::table('breeds')->insert(array(
			array('id'=>1, 'name'=>"Domestic"),
			array('id'=>2, 'name'=>"German"),
			array('id'=>3, 'name'=>"African"),
			array('id'=>4, 'name'=>"Wild"),
		));
	}
}