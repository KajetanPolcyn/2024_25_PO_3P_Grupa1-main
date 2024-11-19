<?php

// ===========================
// FEATURED OFFERS
// ===========================
class featuredOffer
{
    public $id;
    public $name;
    public $country;
    public $city;
    public $day_price_pln;
    public $thumbnail;

    public function __construct($id, $name, $country, $city, $day_price_pln, $thumbnail)
    /**
     * Constructor for featuredOffer class
     *
     * @param int $id Unique identifier for the offer
     * @param string $name Name of the offer
     * @param string $country Country where the offer is located
     * @param string $city City where the offer is located
     * @param float $day_price_pln Price of the offer per day in PLN
     * @param string $thumbnail Thumbnail image path for the offer
     */
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->city = $city;
        $this->day_price_pln = $day_price_pln;
        $this->thumbnail = $thumbnail;
    }
}

// ===========================
// OFFERS WITH DESCRIPTION
// ===========================
class offerWithDescription
{
    public $id;
    public $name;
    public $country;
    public $city;
    public $day_price_pln;
    public $thumbnail;
    public $description;

    public function __construct($id, $name, $country, $city, $day_price_pln, $thumbnail, $description)
    /**
     * Constructor for offerWithDescription class
     *
     * @param int $id Unique identifier for the offer
     * @param string $name Name of the offer
     * @param string $country Country where the offer is located     
     * @param string $city City where the offer is located
     * @param float $day_price_pln Price of the offer per day in PLN
     * @param string $thumbnail Thumbnail image path for the offer
     * @param string $description Description of the offer
     */
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->city = $city;
        $this->day_price_pln = $day_price_pln;
        $this->thumbnail = $thumbnail;
        $this->description = $description;
    }
}

// ===========================
// FULL OFFERS
// ===========================

class fullOffer // TODO when changing table offers
{
    public $id;
    public $name;
    public $country;
    public $city;
    public $street;
    public $apartment_number;
    public $post_code;
    public $thumbnail;
    public $day_price_pln;
    public $description;
    public $views;

    /**
     * Constructor for the fullOffer class
     *
     * @param int $id Unique identifier for the offer
     * @param string $name Name of the offer
     * @param string $country Country where the offer is located
     * @param string $city City where the offer is located
     * @param string $street Street address of the offer
     * @param string $apartment_number Apartment number of the offer
     * @param string $post_code Postal code of the offer's location
     * @param string $thumbnail Thumbnail image path for the offer
     * @param float $day_price_pln Daily price of the offer in PLN
     * @param string $description Description of the offer
     * @param int $views Number of times the offer has been viewed
     */
    public function __construct($id, $name, $country, $city, $street, $apartment_number, $post_code, $thumbnail, $day_price_pln, $description, $views)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->apartment_number = $apartment_number;
        $this->post_code = $post_code;
        $this->thumbnail = $thumbnail;
        $this->day_price_pln = $day_price_pln;
        $this->description = $description;
        $this->views = $views;
    }
}
