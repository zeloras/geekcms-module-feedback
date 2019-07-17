<?php

namespace GeekCms\Feedback\Models;

use App\Models\MainModel;
use Ponich\Eloquent\Traits\VirtualAttribute;

class Lead extends MainModel
{
    use VirtualAttribute;

    public $table = 'feedback_leads';

    public $guarded = [];

    public $virtalAttributes = [];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'notify'
    ];
}
