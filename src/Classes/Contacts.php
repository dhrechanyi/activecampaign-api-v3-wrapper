<?php

namespace Hrechanyi\ActiveCampaign\Classes;



class Contacts extends Connector
{


	public function get($contact_id = null)
	{
		return $this->request('GET', 'contacts/' . strval($contact_id));
	}


	public function getByList($list_id)
	{
		return $this->request('GET', 'contacts?listid=' . $list_id);
	}


	public function getByEmail($email)
	{
		return $this->request('GET', 'contacts?email=' . $email);
	}

	public function all()
	{
		return $this->request('GET', 'contacts');
	}

	public function create($params)
	{
		return $this->request('POST', 'contacts', ['contact' => $params]);
	}


	public function createOrUpdate($params)
	{
		return $this->request('POST', 'contact/sync', ['contact' => $params]);
	}


	public function update($contact_id, $params)
	{
		return $this->request('PUT', 'contacts/' . $contact_id, ['contact' => $params]);
	}


	public function delete($contact_id)
	{
		return $this->request('DELETE', 'contacts/' . strval($contact_id));
	}


	public function getCustomFieldValue($custom_field_id)
	{
		return $this->request('GET', 'fieldValues/' . strval($custom_field_id));
	}


	public function allCustomFieldValues()
	{
		return $this->request('GET', 'fieldValues');
	}


	public function createCustomFieldValue($params)
	{
		return $this->request('POST', 'fieldValues', ['fieldValue' => $params]);
	}


	public function addTag($params)
	{
		return $this->request('POST', 'contactTags', ['contactTag' => $params]);
	}


	public function deleteTag($contact_tag_id)
	{
		return $this->request('DELETE', 'contactTags/' . strval($contact_tag_id));
	}


	public function getTags($contact_id)
	{
		return $this->request('GET', 'contacts/' . strval($contact_id) . '/contactTags');
	}


	public function getLists($contact_id)
	{
		return $this->request('GET', 'contacts/' . strval($contact_id) . '/contactLists');
	}

	public function updateListStatus($params)
	{
		return $this->request('POST', 'contactLists', ['contactList' => $params]);
	}


}