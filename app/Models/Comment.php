<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * Comment -extend from DatabaseQuery
 */
class Comment extends DatabaseQuery
{
    protected $table = 'comments';
}
