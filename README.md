# php-osu-api
Allows easy access to the osu! API using PHP.

### How to use
```php
require_once 'osu.php';

$osu = new Osu(); // Creates an instance of Osu

$rank = $osu->get_user("Gregg")['pp_rank']; // Gets your rank
```
