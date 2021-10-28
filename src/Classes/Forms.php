<?php

namespace Dhrechanyi\ActiveCampaign\Classes;

use Dhrechanyi\ActiveCampaign\Connector;


class Forms extends Connector
{

	public function get($form_id)
	{
		return $this->request('GET', 'forms/' . strval($form_id));
	}


	public function all()
	{
		return $this->request('GET', 'forms');
	}

}
