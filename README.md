# Radiula Title

[![Build Status](https://travis-ci.org/radiula/title.svg)](https://travis-ci.org/radiula/title)

## Install

Pull this package in through Composer.

    {
        "require": {
        "radiula/title": "~0.3"
    }
    


Add the following to you `app/config/app.php`

    'providers' => [
        '...',
        'Radiula\Title\TitleServiceProvider'
    ];
    
    'aliases' => [
        '...',
        'Title' => 'Radiula\Title\Facades\Title',
    ];
    

## Usage
#### Set the site title

    Title::siteName('Acme Site');
    
#### Set one or more segments

    Title::segment('Foo', 'Bar');

#### Make the title
    
    Title::make();

#### Overriding the layout
    
    Title::layout('%s - %s');


Running the `siteName` and `segment` methods with the above properties (and the default layout), would cause `make` to output the following
    
    Foo | Bar | Acme Site
