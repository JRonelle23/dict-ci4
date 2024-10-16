<?php

namespace App\Models;

use CodeIgniter\Model;

class JobPosts extends Model
{
    protected $table      = 'jobs';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description', 'salary', 'date_post'];
}