<?php

namespace Domain\Account\Models;

use Laratrust\Models\LaratrustRole;
use Spatie\Activitylog\Traits\LogsActivity;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Role extends LaratrustRole
{
    use LogsActivity;
    use HasEagerLimit;

    protected static $logFillable = true;

    protected static $logName = 'admin';

    protected $fillable = ['name', 'display_name', 'description'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return ":subject.display_name role was {$eventName}";
    }

    /**
     * Morph by Many relationship between the role and the one of the possible
     * user models.
     *
     * NOTE: This method is being overridden by Nova to ensure we always return
     * the users for a role in alphabetical order.
     *
     * @param  string  $relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function getMorphByUserRelation($relationship)
    {
        return parent::getMorphByUserRelation($relationship)
            ->orderBy('name');
    }
}
