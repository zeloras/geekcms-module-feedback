<?php

namespace GeekCms\Feedback\Models;

use Illuminate\Database\Eloquent\Model;
use Ponich\Eloquent\Traits\VirtualAttribute;

class Lead extends Model
{
    use VirtualAttribute;

    public $table = 'feedback_leads';

    public $guarded = [];

    public $virtalAttributes = [];
}
