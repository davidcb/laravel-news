<?php

namespace Davidcb\News\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $fillable = ['title', 'description', 'published_at'];

    public function setPublishedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['published_at'] = $date->format('Y-m-d');
    }

    public function publishedAtReadable($format = 'd/m/Y')
    {
        $date = \DateTime::createFromFormat('Y-m-d', $this->published_at);
        return $date ? $date->format($format) : null;
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->orderBy('orderby');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable')->orderBy('orderby');
    }
}
