<?php

namespace Discoverlance\FilamentPageHints\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $uuid
 * @property string $route
 * @property string $title
 * @property string $url
 * @property string $hint
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class PageHint extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTable(): string
    {
        return config('filament-page-hints.table_name', parent::getTable());
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function getEmbedUrlAttribute()
    {
        $url = $this->video_url;

        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $matches)) {
            return 'https://www.youtube-nocookie.com/embed/'.$matches[1];
        } elseif (preg_match('/vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)/i', $url, $matches)) {
            return 'https://player.vimeo.com/video/'.$matches[3];
        }

        return false;
    }

    protected static function booted(): void
    {
        static::creating(function ($hint) {
            $hint['uuid'] = Str::uuid();
        });
    }
}
