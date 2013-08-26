BaseStatus
==========

Basecamp To-Do's panels for Panic's StatusBoard

Synopsis
--------
This is a basic web service for displaying your [Basecamp](https://basecamp.com) ToDo's on [Panics Status Board](http://panic.com/statusboard/).

Author
------
James Roberts

## Requirements
* PHP 5.3 with cURL support

## Getting Started

### Download


### Usage

Rename ```settings-RENAME.php``` to ```settings.php```
Change file to reflect your Basecamp settings

```php
<?php

$appName = 'BaseStatus';
$appContact = '';

$basecampAccountID 	= '';
$basecampUsername 	= '';
$basecampPassword 	= '';
$basecampProject 		= '';
$basecampMe 				= ''; 

?>
```

Within [Status Board](http://panic.com/statusboard/) add a new 'Do-It-Yourself' or 'Graph' (see below for when to choose which) block and link to the below functions.


## Function List

* Your open ToDo's count - ```http://www.yourserver.com/BaseStatus/index.php?fc=mytdcount``` _Graph_
* Your open ToDo's list - ```http://www.yourserver.com/BaseStatus/index.php?fc=myopentd```	_Do-It-Yourself_
* Project Team assigned ToDo's count  - ```http://www.yourserver.com/BaseStatus/index.php?fc=alltdcount```	_Graph_
* Project Team assigned ToDo's count  - ```http://www.yourserver.com/BaseStatus/index.php?fc=alltdcounttb```	_Table_


Future Development
------------------

- [ ] Order ToDo's by Date
- [ ] Only show ToDo's with completion date (similar to 'me' on Basecamp)
- [ ] Show all ToDo's

Thanks
------
* Fedil Grogan (https://github.com/ukneeq) for the creation of the BasecampApi
* Gunther Groenewege (https://github.com/groenewege) for advice and help also for his great code [basecamp-dashboard](https://github.com/groenewege/basecamp-dashboard)



