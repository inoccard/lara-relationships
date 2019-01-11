<?php

$this->get('one-to-one','OneToOneController@oneToOne');

$this->get('one-to-one-inv','OneToOneController@oneToOneInv');

$this->get('one-to-one-insert','OneToOneController@oneToOneInsert');

$this->get('one-to-many','OneToManyController@oneToMany');

$this->get('many-to-one','OneToManyController@ManyToOne');

$this->get('one-to-many-two','OneToManyController@oneToManyTwo');

$this->get('one-to-many-insert','OneToManyController@oneToManyInsert');

/*HasManyThrough*/
$this->get('has-many-through','OneToManyController@hasManyThrough');

/*ManyToMany*/
$this->get('many-to-many','ManyToManyController@ManyToMany');

/*ManyToManyInverse*/
$this->get('many-to-many-inverse','ManyToManyController@ManyToManyInverse');

/*ManyToManyInsert*/
$this->get('many-to-many-insert','ManyToManyController@ManyToManyInsert');

/*Rolation Polymorphic*/
$this->get('polymorphics','PolymorphicController@polymorphic');

$this->get('polymorphics-insert','PolymorphicController@polymorphicInsert');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
