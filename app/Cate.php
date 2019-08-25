<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Cate
 *
 * @property-read \Kalnoy\Nestedset\Collection|\App\Cate[] $children
 * @property-read \App\Cate $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-write mixed $parent_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Cate newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Cate newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Cate query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $order
 * @property string $slug
 * @property int $_lft
 * @property int $_rgt
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cate whereSlug($value)
 */
class Cate extends Model {
    use NodeTrait;
    protected $guarded = [];
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
