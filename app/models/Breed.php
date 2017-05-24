<?php

class Breed extends Eloquent {
	public $timestamps = false;
	public function dogs() {
	return $this->hasMany('Dog');
	}
}