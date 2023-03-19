<?php
 
namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;

if ($position = Location::get()) {
    // Successfully retrieved position.
    echo $position->countryName;
} else {
    // Failed retrieving position.
}