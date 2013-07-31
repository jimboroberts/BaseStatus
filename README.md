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


Future Development
------------------

- [ ] Order ToDo's by Date
- [ ] Only show ToDo's with completion date (similar to 'me' on Basecamp)

Thanks
------
The main thanks has to go to Fedil Grogan (https://github.com/ukneeq) for the creation of the BasecampApi allow this script to easily connect to basecamp.

## License
This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 3 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


