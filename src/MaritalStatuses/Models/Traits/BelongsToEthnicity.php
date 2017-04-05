<?php

namespace Ethnicities\Models\Traits;

use Myrtle\MaritalStatuses\Models\MaritalStatus;

trait BelongsToMaritalStatus
{

    public function maritalstatus()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_id');
    }
}