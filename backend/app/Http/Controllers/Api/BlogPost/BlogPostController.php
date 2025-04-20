<?php

namespace App\Http\Controllers\Api\BlogPost;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\SaveRequest;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use Exception;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{

    public function details(BlogPost $blog) {
        try {

            $blog->load("user");

            return ApiResponse::success([
                "blog" => BlogPostResource::make($blog)
            ]);

        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function all() {

        try {

            $blogs = BlogPost::with("user")->select('id', 'user_id', 'title', 'created_at', 'updated_at', 'body')->get();
            $blogs = BlogPostResource::collection($blogs);
            return ApiResponse::success($blogs);

        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage());
        }

    }

    public function save(SaveRequest $request) {
        try {
           
            $params = $request->validated();
            $params["user_id"] = $request->user()->id;

            if(!empty($request->id)) {
                $blog = BlogPost::findOrFail($request->id);
                $blog->update($params);
            } else {
                $blog = BlogPost::create($params);
            }

            return ApiResponse::success([
                "blog"  =>  BlogPostResource::make($blog),
            ],message:"Blog Saved");

        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
