<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property mixed id
 * @property mixed user_id
 * @property mixed provider_id
 * @property mixed country_id
 * @property mixed city_id
 * @property mixed address
 * @property mixed lat
 * @property mixed lng
 */
class ProviderAddress extends Model
{
    protected $table = 'provider_addresses';
    protected $fillable = ['user_id','provider_id','country_id','city_id','address', 'lat', 'lng'];

    public function country(){
        $this->belongsTo(Country::class);
    }
    public function city(){
        $this->belongsTo(City::class);
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
    public function getProviderId()
    {
        return $this->provider_id;
    }

    /**
     * @param mixed $provider_id
     */
    public function setProviderId($provider_id): void
    {
        $this->provider_id = $provider_id;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * @param mixed $country_id
     */
    public function setCountryId($country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * @param mixed $city_id
     */
    public function setCityId($city_id): void
    {
        $this->city_id = $city_id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }
    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat): void
    {
        $this->lat = $lat;
    }
    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lat
     */
    public function setLng($lng): void
    {
        $this->lng = $lng;
    }

}
