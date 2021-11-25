<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed id
 * @property mixed user_id
 * @property mixed store_name
 * @property mixed image
 * @property mixed about
 * @property mixed category_id
 * @method Provider find(mixed $provider_id)
 */
class Provider extends Model
{
    protected $table = 'providers';
    protected $fillable = ['user_id','store_name','image','about', 'category_id'];

    public function provider_addresses(): HasMany
    {
        return $this->hasMany(ProviderAddress::class,'provider_id');
    }
    public function discounts(): HasMany
    {
        return $this->hasMany(Discount::class,'provider_id');
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getStoreName()
    {
        return $this->store_name;
    }

    /**
     * @param mixed $store_name
     */
    public function setStoreName($store_name): void
    {
        $this->store_name = $store_name;
    }
    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = Functions::StoreImageModel($image,'Providers');
    }

    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param mixed $about
     */
    public function setAbout($about): void
    {
        $this->about = $about;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id): void
    {
        $this->category_id = $category_id;
    }
}
