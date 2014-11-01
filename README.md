bewustagenda
============

##API Bewust Nederland for data export in xml/json.

Load the api class, setup configuration, filter the data and get the results in xml or json format.

##Required
PHP 5 >= 5.5.0

##Start a request
```php
<?php
require 'bewustagenda/api.php';
$config = [
'domein'   => ''
,'api_id'   => ''
,'api_key'  => ''
,'data_type' => ''
,'api_url'  => ''
];
$bn = new bewustagenda\api($config);
$bn->set_filter('datum','all');
$output = $bn->get_agenda();
echo $output;
?>
```

##Available filters
Vraag alle events op vanaf vandaag:
```php
$bn->set_filter('datum','all');
```
Meer filters op verzoek.

##Result in xml

```xml
<?xml version="1.0" encoding="UTF-8"?>
<events>
 <event>
  <id></id>
  <titel></titel>
  <naam></naam>
  <startdatum></startdatum>
  <einddatum></einddatum>
  <starttijd></starttijd>
  <eindtijd></eindtijd>
  <omschrijving><![CDATA[ ]]></omschrijving>
  <link></link>
  <locatie></locatie>
  <straat></straat>
  <plaats></plaats>
  <prijs></prijs>
  <tariefinfo></tariefinfo>
  <afbeelding></afbeelding>
  <lastupdate></lastupdate>
 </event>
</events>
```

##Result in json

```json
{"0":
	{
		"id":""
		,"titel":""
		,"naam":""
		,"startdatum":""
		,"einddatum":""
		,"starttijd":""
		,"eindtijd":""
		,"omschrijving":""
		,"link":""
		,"locatie":""
		,"straat":""
		,"plaats":""
		,"prijs":""
		,"tariefinfo":""
		,"afbeelding":""
		,"lastupdate":""
	}
}
```
