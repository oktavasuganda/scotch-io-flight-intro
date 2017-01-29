<?php
require 'flight/Flight.php';

// Very basic GET route
Flight::route("/", function(){
  echo 'hello world!';
});

// This route responds to only GET requests for the '/users' url
Flight::route("GET /users", function () {
  echo 'a list of users';
});

// This route responds to only POST requests for the '/users' url
Flight::route("POST /users", function () {
  echo 'new user created';
});

// `@id` is the dynamic part of our url, we get that data as a parameter for our function
Flight::route("GET /users/@id", function ($id) {
  echo 'fetching details for user with id: ' . $id;
});

// It's the same for all other HTTP methods
Flight::route("PUT /users/@id", function ($id) {
  echo 'updating user with id: ' . $id;
});

Flight::route("POST /posts", function () {
	$data = Flight::request()->data;  // we only want the data sent to this request so we access it's 'data' member variable
	echo 'creating new post with name: ' . $data['name'];
});

// This example combines both URL data and FormData
Flight::route("PUT /posts/@id", function ($id) {
	$data = Flight::request()->data;
	echo 'updating post with id:  ' . $id . ', name: ' . $data['name'];
});

Flight::route("GET /allusers", function () {
	Flight::json(array('User 1', 'User 2', 'User 3')); // this returns ['User 1', 'User 2', 'User 3']
});

Flight::start();
?>
