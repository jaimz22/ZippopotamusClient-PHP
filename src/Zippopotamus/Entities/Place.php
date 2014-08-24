<?php
/**
 * @author: James Murray <jaimz@vertigolabs.org>
 * @copyright:
 * @date: 8/24/2014
 * @time: 10:32 AM
 */

namespace Zippopotamus\Entities;


class Place
{
	private $name;
	private $state;
	private $stateAbbreviation;
	private $postalCode;
	private $latitude;
	private $longitude;

	public function __construct($data)
	{
		if (array_key_exists('place name',$data)) {
			$this->name = $data['place name'];
		}
		if (array_key_exists('state',$data)) {
			$this->state = $data['state'];
		}
		if (array_key_exists('state abbreviation',$data)) {
			$this->stateAbbreviation = $data['state abbreviation'];
		}
		if (array_key_exists('post code',$data)) {
			$this->postalCode = $data['post code'];
		}
		if (array_key_exists('latitude',$data)) {
			$this->latitude = $data['latitude'];
		}
		if (array_key_exists('longitude',$data)) {
			$this->longitude = $data['longitude'];
		}
	}
} 