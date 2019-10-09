# ActiveCampaign API v3 Wrapper


Wrapper for ActiveCampaign API v3.\
Allows to make calls in ActiveCampaign services and work with data, using PHP. Simple and easy to use. \
Services available so far:
- Lists
- Contacts
- Tags

## Official API documentation

https://developers.activecampaign.com/v3/reference

## Installation

**ActiveCampaign API v3 Wrapper** is available on Packagist. Just add this line to your **composer.json** file in **require** section

```c
"hrechanyi/activecampaign-api-v3-wrapper": "^1.0"
```

or open terminal window and run

```c
composer require hrechanyi/activecampaign-api-v3-wrapper
```

## Usage

Wrapper allows you to chain methods and use singe instance to apply all needed filters and queries.

### Setup

```php
<?php

// include required classes
require 'vendor/autoload.php';

// add namespace
use Hrechanyi\ActiveCampaign\ActiveCampaign;

// create wrapper instance
$ac = new ActiveCampaign('YOUR_ACTIVE_CAMPAIGN_URL', 'YOUR_ACTIVE_CAMPAIGN_KEY');
```

### Get service models

To get access to activecampaign api endpoints, you need to create service model first. Here is how you can do it:

```php
// lists
$lists = $ac->lists();

// contacts
$contacts = $ac->contacts();

// tags
$tags = $ac->tags();
```

### Basic example

To retrieve all lists, call for the `->all()` method. This method should be always at the very end of your chain sequence:

```php
$lists = $ac->lists()->all();
```
_Note that be default, activecampaign api returns 20 items. To change that, you need to use `pagination()` method_


### Pagination

https://developers.activecampaign.com/v3/reference#pagination \
Pagination allows you to get needed amount of items and make offsets.

```php
// ->paginate($limit, $offset = 0)

// fetch 50 lists
$paginated_lists = $ac->lists()->paginate(50)->all();
```

### Sorting

https://developers.activecampaign.com/v3/reference#section-ordering \
You can sort results in needed order. Use `->orderby()` method and pass as argument an array, where key is the name of field and value is order (asc or desc).
 
```php
// get all contacts and sort them by email in asc order and by last name in desc order
$contacts = $ac->contacts()->order(['email' => 'asc', 'lastName' => 'desc'])->all();
```

### Filtering

https://developers.activecampaign.com/v3/reference#section-filtering \
You can filter results by multiple parameters. Use `->filter()` method and pass an array as argument, where key is parameter name and value is parameter value.

```php
// get contacts where first name is equal to John
$contacts = $ac->contacts()->filter(['firstName' => 'john'])->all();
```

### URL Queries

Additionaly, you can add any parameter to url that will be send to activecampaign endpoint. Use `->query()` method and pass as argument an array with parameters key and value

```php
$ac->tags()->query(['foo' => 'bar'])->all();
```

### Get item by ID

To access any item by it's ID, use `->get()` method.

```php
// get tag with ID = 1
$tag = $ac->tags()->get(1);
```

### Advanced examples

```php
// skip 10 tags and get next 50 tags, also order them by description
$tags = $ac->tags()->orderby(['description' => 'asc'])->paginate(50, 10)->all();

// get contact where email is equal to 'john@mail.com'
$contact = $ac->contacts()->getByEmail('john@mail.com');

// create new contact
$ac->contacts()->create([
  'email'     => 'johndoe@example.com',
  'firstName' => 'John',
  'lastName'  => 'Doe',
  'phone'     => '7223224241'
]);

// create new tag
$ac->tags()->create([
  'tag'         => 'My Tag',
  'tagType'     => 'contact',
  'description' => 'Description'
]);

// add tag to contact
$ac->contacts()->addTag([
  'contact' => '1', // contact ID
  'tag'     => '20' // tag ID
]);


```

## Available methods

### Lists

https://developers.activecampaign.com/v3/reference#lists

| Method | Description |
| --- | --- |
| get($list_id) | Get list by ID |
| all() | Get all lists |
| create($params) | Create list https://developers.activecampaign.com/reference#create-new-list |
| createGroup($params) | Create list group permission https://developers.activecampaign.com/reference#create-a-list-group-permission |
| delete($list_id) | Delete list by ID |

_NOTE: When creating a new list, it is important to then associate that list to a group permission_

### Contacts

https://developers.activecampaign.com/v3/reference#contact

| Method | Description |
| --- | --- |
| get($contact_id) | Get contact by ID |
| getByList($list_id) | Get contact by list ID |
| getByEmail($email) | Get contact by email |
| all() | Get all contact |
| create($params) | Create contact https://developers.activecampaign.com/reference#create-contact |
| createOrUpdate($params) | Create contact or update if it's already exists (sunc by email) https://developers.activecampaign.com/reference#create-contact-sync |
| update($contact_id, $params) | Update contact https://developers.activecampaign.com/reference#update-a-contact |
| delete($contact_id) | Delete contact by ID |
| getCustomFieldValue($custom_field_id) | Get custom field value |
| allCustomFieldValues() | Get all custom fields values |
| createCustomFieldValue($params) | Create custom field value https://developers.activecampaign.com/reference#retrieve-fields |
| addTag($params) | Add tag to contact https://developers.activecampaign.com/reference#create-contact-tag |
| deleteTag($contact_tag_id) | Delete tag from contact |
| getTags($contact_id) | Get all contact's tags |
| getLists($contact_id) | Get all contact's lists |
| updateListStatus($params) | Update list status on contact https://developers.activecampaign.com/reference#update-list-status-for-contact |

### Tags

https://developers.activecampaign.com/reference#tags

| Method | Description |
| --- | --- |
| get($tag_id) | Get tag by ID |
| all() | Get all tags |
| create($params) | Create tag https://developers.activecampaign.com/reference#create-a-new-tag |
| update($tag_id, $params) | Update tag https://developers.activecampaign.com/reference#update-a-tag |
| delete($tag_id) | Delete tag by ID |






