<?php

Route::model('dog', 'Dog');

Route::get('/', function(){
	return Redirect::to('dogs');
});

Route::get('dogs', function(){
	$dogs = Dog::all();
	return View::make('dogs.index')->with('dogs', $dogs);
});


Route::get('dogs/{id}', function($id){
	return "Dog #$id";
})->where('id', '[0-9]+');


Route::get('dogs/{id}', function($id){
	$dog = Dog::find($id);
	return View::make('dogs.single')->with('dog', $dog);
});

Route::get('dogs/breeds/{name}', function($name){
	$breed = Breed::whereName($name)->with('dogs')->first();
	return View::make('dogs.index')
	  ->with('breed', $breed)
	  ->with('dogs', $breed->dogs);
});

Route::get('dogs/create', function(){
	$dog = new Dog;
	return View::make('dogs.edit')
	  ->with('dog', $dog)
	  ->with('method', 'post');
});

Route::get('dogs/{dog}/edit', function(Dog $dog) {
	return View::make('dogs.edit')
	  ->with('dog', $dog)
	  ->with('method', 'put');
});

Route::get('dogs/{dog}/delete', function(Dog $dog) {
	return View::make('dogs.edit')
	  ->with('dog', $dog)
	  ->with('method', 'delete');
});

Route::get('about', function(){
	return View::make('about')->with('number_of_dogs', 9000);
});

Route::post('dogs', function() {
	$dog = Dog::create(Input::all());
	return Redirect::to('dogs/' . $dog->id)
	  ->with('message', 'Successfully created page!');
});

Route::put('dogs/{dog}', function(Dog $dog) {
	$dog->update(Input::all());
	return Redirect::to('dogs/' . $dog->id)
	  ->with('message', 'Successfully updated page!');
});

Route::delete('dogs/{dog}', function(Dog $dog) {
	$dog->delete();
	return Redirect::to('dogs')
	  ->with('message', 'Successfully deleted page!');
});

View::composer('dogs.edit', function($view)
{
	$breeds = Breed::all();
	if(count($breeds) > 0) {
		$breed_options = array_combine($breeds->lists('id'), $breeds->lists('name'));
	} else {
		$breed_options = array(null, 'Unspecified');
	}
	$view->with('breed_options', $breed_options);
});
