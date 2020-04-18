<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use App\Models\Traits\Timestamp;

class Advert extends Model
{
    //protected $dateFormat = 'U';
    use Notifiable, Timestamp;
    protected $table = 'f_notice_config';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

}
