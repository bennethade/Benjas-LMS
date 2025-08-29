<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InfoBox;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendDashboardController extends Controller
{
    public function home()
    {
        $allSliders = Slider::latest()->get();
        $allInfoBox = InfoBox::all();
        $allCategories = Category::inRandomOrder()->limit(6)->get();
        return view('frontend.pages.home.index', compact('allSliders', 'allInfoBox', 'allCategories'));
    }



}
