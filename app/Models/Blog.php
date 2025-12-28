<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'author_id',
        'category',
        'tags',
        'is_published',
        'published_at',
        'views_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'views_count' => 'integer',
            'tags' => 'array',
        ];
    }

    /**
     * Get the author of the blog.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the featured image URL.
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->featured_image) {
            return 'https://placehold.co/600x400?text=Blog';
        }

        if (str_starts_with($this->featured_image, 'http')) {
            return $this->featured_image;
        }

        return \Storage::url($this->featured_image);
    }
}
