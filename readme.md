Flash Bundle
============

[![Build Status](https://travis-ci.org/andrewtarry/ajt-flashbundle.png?branch=master)](https://travis-ci.org/andrewtarry/ajt-flashbundle)

The AJT Flash Bundle will manage the use of Symfony flash messages with a simple API.

Usage
-----

Inject the Flash service into any service

    <argument type="service" id="ajt.flash" />

Use it in service

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

Use the twig fragment in your template.

    {{ include('AJTFlashBundle::flash.html.twig') }}

Standard Types
----------------

By default the Flash bundle will support the standard bootstrap alert types.

    // Set a custom type

    $flash->set('my message', 'myType');

    // Bootstrap
    $flash->success('my message');
    $flash->error('my message');
    $flash->info('my message');
    $flash->warning('my message');