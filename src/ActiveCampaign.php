<?php

namespace Dhrechanyi\ActiveCampaign;

use Dhrechanyi\ActiveCampaign\Classes\Lists;
use Dhrechanyi\ActiveCampaign\Classes\Contacts;
use Dhrechanyi\ActiveCampaign\Classes\Tags;
use Dhrechanyi\ActiveCampaign\Classes\Forms;


class ActiveCampaign
{
	private $base_url;
	private $api_key;

	public function __construct($base_url, $api_key)
	{
		$this->base_url = $base_url;
		$this->api_key = $api_key;
	}

	public function lists()
	{
		return new Lists($this->base_url, $this->api_key);
	}

	public function contacts()
	{
		return new Contacts($this->base_url, $this->api_key);
	}

	public function tags()
	{
		return new Tags($this->base_url, $this->api_key);
	}

	public function forms()
	{
		return new Forms($this->base_url, $this->api_key);
	}

}
