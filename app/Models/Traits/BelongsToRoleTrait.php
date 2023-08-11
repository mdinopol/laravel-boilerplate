<?php

namespace App\Models\Traits;

use App\Enum\Role;

trait BelongsToRoleTrait
{
    /**
     * @var string the required role for the action
     */
    public function hasRoleAuthorization(string $role): bool
    {
        if ($requiredRoleForAction = Role::tryFrom($role)) {
            return $this->role->value === $requiredRoleForAction->value
                || $this->role->level() > $requiredRoleForAction->level();
        }

        throw new \UnexpectedValueException('Role name not found.');
    }
}
