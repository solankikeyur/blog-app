<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = "posts";

    public $fillable = [
        "user_id",
        "title",
        "slug",
        "body",
        "created_at",
        "updated_at"
    ];

    public function user() {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
