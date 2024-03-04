<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReinVanOyen\Cmf\Models\MediaFile;

class Project extends Model
{
    use HasFactory;

    protected $with = [
        'photo',
        'rows',
    ];

    protected $table = 'projects';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo(MediaFile::class, 'photo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rows()
    {
        return $this->hasMany(Row::class)->orderBy('order', 'asc');
    }
}
