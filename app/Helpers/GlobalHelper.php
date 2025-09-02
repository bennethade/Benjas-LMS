<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;


//Instructor Approved via Admin
if(!function_exists('isApprovedUser')){
    function isApprovedUser(){
        $user_id = Auth::id();
        return User::where('role', 'instructor')->where('status', '1')->where('id', $user_id)->first();
    }
}




//Global Use in category


if(!function_exists('getCategories')){
    function getCategories() {
        return Category::with('subcategories')->orderBy('name', 'asc')->get();
    }
}





// Set Sidebar Active Link
// function setActiveRoute($route)
// {
//     return request()->routeIs($route) ? 'mm-active' : '';
// }   

if(!function_exists('setSidebard')){
    function setSidebar(array $routes) : ?string{
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'mm-active';
            }
        }
        return null;
    }
}



//Get Course Category Globally
if(!function_exists('getCourseCategories')){
    function getCourseCategories(){
        return Category::with('course', 'course.user', 'course.course_goal')->get();
    }
}