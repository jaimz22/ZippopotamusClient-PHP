<?php
/**
 * @author: James Murray <jaimz@vertigolabs.org>
 * @copyright:
 * @date: 8/24/2014
 * @time: 10:29 AM
 */

namespace Zippopotamus\Entities;


class Response
{
	private $country;
	private $countryAbbreviation;
	private $postalCode;
	private $places;

	public function __construct($data)
	{
		if (array_key_exists('country',$data)) {
			$this->country = $data['country'];
		}
		if (array_key_exists('country abbreviation',$data)) {
			$this->countryAbbreviation = $data['country abbreviation'];
		}
		if (array_key_exists('post code',$data)) {
			$this->postalCode = $data['post code'];
		}
		if (array_key_exists('places',$data)) {
			foreach($data['places'] as $place) {
				$this->places[] = new Place($place);
			}
		}
	}

	/**
	 * @return mixed
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @return mixed
	 */
	public function getCountryAbbreviation()
	{
		return $this->countryAbbreviation;
	}

	/**
	 * @return mixed
	 */
	public function getPlaces()
	{
		return $this->places;
	}

	/**
	 * @return mixed
	 */
	public function getPostalCode()
	{
		return $this->postalCode;
	}
} 