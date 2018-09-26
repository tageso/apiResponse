# Lumen Response class for API Calls
API Response and Middelware for Lumen to response with a default Json Schema to API-Calls

# Install

## Install via composer
Make sure the package is required via composer.json
```
{
    "require": {
        "tageso/api-response": "*",
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/tageso/apiResponse.git"
        }
    ]
}
```

## Install Middelware
To enable the JSON-Response you need to add the Middelware. Add the following lines to the bootstrap/app.php

```
$app->middleware(array(
    TaGeSo\APIResponse\Middelware::class
));
```

# Usage
In the controller add Tageso as Response and use it in the Action functions. Than you can use the $response->withData function to return a JSON-Object.

```
<?php
namespace App\Http\Controllers;

use TaGeSo\APIResponse\Response;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request, Response $response) {
    {
        //
        return $response->withData(["foo" => "bar"]);
    }
```
