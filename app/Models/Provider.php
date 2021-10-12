<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property mixed id
 * @property mixed user_id
 * @property mixed store_name
 * @property mixed store_owner_name
 * @property mixed commercial_register_number
 * @property mixed commercial_register_image
 */
class Provider extends Model
{
    protected $table = 'providers';
    protected $fillable = ['user_id','store_name','store_owner_name','commercial_register_number','commercial_register_image',];

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
    public function getStoreOwnerName()
    {
        return $this->store_owner_name;
    }

    /**
     * @param mixed $store_owner_name
     */
    public function setStoreOwnerName($store_owner_name): void
    {
        $this->store_owner_name = $store_owner_name;
    }

    /**
     * @return mixed
     */
    public function getCommercialRegisterNumber()
    {
        return $this->commercial_register_number;
    }

    /**
     * @param mixed $commercial_register_number
     */
    public function setCommercialRegisterNumber($commercial_register_number): void
    {
        $this->commercial_register_number = $commercial_register_number;
    }

    /**
     * @return mixed
     */
    public function getCommercialRegisterImage()
    {
        return $this->commercial_register_image;
    }

    /**
     * @param mixed $commercial_register_image
     */
    public function setCommercialRegisterImage($commercial_register_image): void
    {
        $this->commercial_register_image = $commercial_register_image;
    }

}
