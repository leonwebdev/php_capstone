<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * Category -extend from DatabaseQuery
 */
class Category extends DatabaseQuery
{
    protected $table = 'categories';
}
