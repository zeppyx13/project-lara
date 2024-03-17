<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body',
    // ];
    protected $guarded = ['id'];
    protected $with = ['author', 'catagory'];
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['cari']) ? $filters['cari'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['cari'] . '%')
        //         ->orWhere('slug', 'like', '%' . $filters['cari'] . '%')
        //         ->orWhere('excerpt', 'like', '%' . $filters['cari'] . '%');
        // }
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where(function ($query) use ($cari) {
                $query->where('title', 'like', '%' . $cari . '%')
                    ->orWhere('body', 'like', '%' . $cari . '%')
                    ->orWhere('excerpt', 'like', '%' . $cari . '%');
            });
        });
        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('catagory', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // });

        // $query->when($filters['authors'] ?? false, function ($query, $authors) {
        //     return $query->whereHas('author', function ($query) use ($authors) {
        //         $query->where('username', $authors);
        //     });
        // });
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'catagory',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );
        $query->when(
            $filters['authors'] ?? false,
            fn ($query, $authors) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $authors)
            )
        );
    }
    public function catagory()
    {
        return $this->belongsTo(catagory::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
