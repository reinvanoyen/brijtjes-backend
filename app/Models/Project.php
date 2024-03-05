<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReinVanOyen\Cmf\Models\MediaFile;
use ReinVanOyen\Cmf\Traits\HasAutoIncrements;

class Project extends Model
{
    use HasFactory;
    use HasAutoIncrements;

    protected $table = 'projects';

    /**
     * @var string[] $autoIncrement
     */
    protected $autoIncrement = ['order',];

    /**
     * @param Builder $query
     * @return void
     */
    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('order');
    }

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

    /**
     * @return bool|void|null
     */
    public function delete()
    {
        foreach ($this->rows as $row) {
            $row->delete();
        }

        parent::delete();
    }
}
