<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function sponsors() {
        return $this->belongsToMany('App\Sponsor');
    }

    public function services() {
        return $this->belongsToMany('App\Service');
    }

    public function apartmentPics() {
        return $this->hasMany('App\ApartmentPic');
    }

    protected $fillable=[
        'title',
        'description',
        'rooms',
        'beds',
        'baths',
        'sq_meters',
        'price',
        // 'visible', usato nel controller
        'check_in',
        'check_out',
        'max_guests',
        'address',
        'latitude',
        'longitude',
        /* 'view_count,' */
        'user_id'
    ];
}
