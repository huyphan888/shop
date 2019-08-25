<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attachment
 *
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $path
 * @property int|null $product_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUpdatedAt($value)
 */
class Photo extends Model
{
    protected $guarded = [];
    private $dir = '/images/';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getFileAttribute($path)
    {
        return $this->dir. $path;
    }
    

}
