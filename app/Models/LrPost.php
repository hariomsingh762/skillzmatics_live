<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LrPost extends Model
{
    use HasFactory;
    protected $table = 'lr_posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'post_author',
        'post_date',
        'post_date_gmt',
        'post_content',
        'post_title',
        'post_excerpt',
        'post_status',
        'comment_status',
        'ping_status',
        'post_name',
        'post_modified',
        'post_modified_gmt',
        'post_parent',
        'menu_order',
        'post_type',
        'post_mime_type',
        'comment_count',
    ];
}
