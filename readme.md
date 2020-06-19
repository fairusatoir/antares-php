# Antares PHP

### Usage
```php    
include('antares-php.php');

$antares = new antares_php();

$antares->set_key('your-access-key-here');

$yourdata = '{"sensor":"value","sensor":"value"}';

$antares->send($yourdata, 'your-device-name', 'your-application-name');  

<<<<<<< HEAD
$Viewdata = $antares->get('your-device-name', 'your-application-name');
=======
$Viewdata = $antares->print('your-device-name', 'your-application-name');
>>>>>>> 35092da03776fdc7f5fc29c000c745acc843160a

$Viewdata_encode = json_encode($Viewdata);
``` 


### Reference

```php
$antares = new antares_php(); 
```
- All methods and properties need to be insantiated in order to use them

<br/>

```php 
set_key('your-access-key-here');
``` 		
- Set the  `your-access-key-here` parameter to your Antares access key.

<br/>

```php 
send($yourdata, 'your-device-name', 'your-application-name'); 
``` 		
- Set the  `yourdata` parameter to your data with JSON Format.
- Set the  `your-device-name` parameter to your Antares device name.
- Set the  `your-application-name` parameter to your Antares application name.

<br/>

```php 
<<<<<<< HEAD
$yourdata  =  $antares->get('your-device-name', 'your-application-name');
=======
$yourdata  =  $antares->print('your-device-name', 'your-application-name');
>>>>>>> 35092da03776fdc7f5fc29c000c745acc843160a
``` 		
- Get your data from Antares. return : JSON format
- Set the  `your-device-name` parameter to your Antares device name.
- Set the  `your-application-name` parameter to your Antares application name.

