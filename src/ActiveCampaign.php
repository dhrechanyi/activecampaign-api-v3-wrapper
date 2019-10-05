<?php

namespace Hrechanyi\ActiveCampaign;


class ActiveCampaign
{
	private $base_url;
	private $api_key;

	public function __construct($base_url, $api_key)
	{
		$this->base_url = $base_url;
		$this->api_key = $api_key;
	}

}