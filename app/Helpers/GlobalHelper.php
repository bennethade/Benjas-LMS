<?php


//Global Use in category

use App\Models\Category;

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