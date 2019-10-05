<?php

namespace Hrechanyi\ActiveCampaign\Classes;

use Hrechanyi\ActiveCampaign\Connector;


class Lists extends Connector
{


	public function get($list_id)
	{
		return $this->request('GET', 'lists/' . strval($list_id));
	}


	public function all()
	{
		return $this->request('GET', 'lists');
	}


	public function create($params)
	{
		return $this->request('POST', 'lists', ['list' => $params]);
	}


	public function createGroup($params)
	{
		return $this->request('POST', 'listGroups', ['listGroup' => $params]);
	}


	public function delete($list_id)
	{
		return $this->request('DELETE', 'lists/' . strval($list_id));
	}

}