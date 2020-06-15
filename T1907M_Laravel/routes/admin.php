<?php
Route::get("/demo-routing","WebController@demoRouting");
Route::get("/login","WebController@login");
Route::get("/layout","WebController@layout");
//category
Route::get("/list-category","WebController@listCategory");
Route::get("/edit-category","WebController@editCategory");
Route::put("update-category","WebController@updateCategory");
Route::delete("/delete-category/{id}","WebController@deleteCategory");
// Product
Route::get("/list-product","WebController@listProduct");
