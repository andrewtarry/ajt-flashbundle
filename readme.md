Flash Bundle
============

[![Build Status](https://travis-ci.org/andrewtarry/ajt-flashbundle.png?branch=master)](https://travis-ci.org/andrewtarry/ajt-flashbundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d78549b1-1645-4ce7-884e-50df7d703063/big.png)](https://insight.sensiolabs.com/projects/d78549b1-1645-4ce7-884e-50df7d703063)

The AJT Flash Bundle will manage the use of Symfony flash messages with a simple API.

Usage
-----

Inject the Flash service into any service

```XML
<argument type="service" id="ajt.flash" />
```

Use it in service

```PHP
class MyClass
{

    private $flash;

    public function __construct(FlashInterface $flash)
    {
        $this->flash = $flash;
    }

    public function goThings()
    {
        ...
        $this->flash->success("Well done");
    }
}
```


Use the twig function in your template,

```Twig
{{ ajt_flash() }}
```

Or if you want to only display some types of message

```Twig
{{ ajt_flash('error') }}
```
	
Standard Types
----------------

By default the Flash bundle will support the standard bootstrap alert types.

```PHP
// Set a custom type

$flash->set('my message', 'myType');

// Bootstrap
$flash->success('my message');
$flash->error('my message');
$flash->info('my message');
$flash->warning('my message');
```
    
Custom Css
----------

Custom css classes can be set by modifying config. 

```YAML
ajt_flash:
	default_class: alert # Added to every flash
	
	# CSS to add to the standard flash types - default to bootstrap
	core:
		success: alert-success
		error: alert-danger
		info: alert-info
		warning: alert-warning
	
	# Add a custom flash type called myType with the css myCss
	custom:
		myType:
			type: myType
			css: myCss
```
