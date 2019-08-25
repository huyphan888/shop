<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string $code
 * @property string|null $content
 * @property array|null $attributes
 * @property int $original_price
 * @property int $sale_price
 * @property int $quantity
 * @property int $featured
 * @property int $cate_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $attachments
 * @property-read \App\Cate $cate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereOriginalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUserId($value)
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Tag
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App{
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
	class Cate extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string|null $photo_id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string $isActive
 * @property string|null $email_verified_at
 * @property string $password
 * @property int $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $gravatar
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Photo|null $photo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \App\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Reply
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $photo
 * @property int $is_active
 * @property string $content
 * @property int $comment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Comment $comment
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereUpdatedAt($value)
 */
	class Reply extends \Eloquent {}
}

namespace App{
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
 * @property string $file
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereFile($value)
 */
	class Photo extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $photo
 * @property int $is_active
 * @property string $content
 * @property int $rating
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reply[] $replies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

