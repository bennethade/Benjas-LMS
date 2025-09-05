<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Wishlist;

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



//Grab wishlist data
if(!function_exists('getWishlist')){
    function getWishlist(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            return Wishlist::where('user_id', $user_id)->with('course', 'course.user')->get();
        }

        return collect();
    }
}





//Global Auth Check
function auth_check_json(){
    if(!Auth::check()){
        return response()->json([
            'status' => 'error',
            'message' => 'You must be logged in first'
        ], 401);
    }
}