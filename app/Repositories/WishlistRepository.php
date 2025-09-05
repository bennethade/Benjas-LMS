<?php

namespace App\Repositories;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistRepository
{
    public function createWishlist($course_id)
    {
        try{
            if(!Auth::check()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please Login! You are not authorized'
                ], 401);
            }

            $userId = Auth::id();

            $exists = Wishlist::where('user_id', $userId)->where('course_id', $course_id)->exists();

            if(!$exists)
            {
                Wishlist::create([
                    'user_id' => $userId,
                    'course_id' => $course_id,
                ]);

                $wishlistCount = Wishlist::where('user_id', $userId)->count();

                $wishlist_course = Wishlist::where('user_id', $userId)->with('course', 'course.user')->get();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Wishlist added successfully',
                    'wishlist_count' => $wishlistCount,
                    'wishlist_course' => $wishlist_course,
                ], 200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Item already added to wishlist'
                ], 409);
            }

        }catch(\Exception $error){

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! ' . $error->getMessage()
            ], 500);

        }
    }
    
}   