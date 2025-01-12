<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function readDuration()
    {
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = round($totalWords / 200);
        return intval($minutesToRead);
    }

    public static function toBeRevisedCount()
    {
        return Article::where('is_accepted', null)->count();
    }

    public static function getAcceptedArticles()
    {
        return Article::where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
    }
    
    public static function getRejectedArticles()
    {
        return Article::where('is_accepted', false)->orderBy('updated_at', 'desc')->get();
    }

    public static function getArticles()
{
    $articles = Article::whereIn('is_accepted', [true, false])
        ->orderBy('updated_at', 'desc')
        ->get();

    return $articles;
}

    public static function toBeNotifiedCount()
    {
        $acceptedArticles = Article::where('is_accepted', true)->where('user_id', '=', Auth::user()->id)->count();
        $rejectedArticles = Article::where('is_accepted', false)->where('user_id', '=', Auth::user()->id)->count();

        $sum = $acceptedArticles + $rejectedArticles;

        return $sum;
    }
}
