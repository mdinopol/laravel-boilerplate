<?php

namespace App\Models\Traits;

use App\Enum\Role;

trait BelongsToRoleTrait
{
    /**
     * @var string $role The required role for the action.
     */
    public function hasRoleAuthorization(string $role): bool
    {
        $userRole = request()->user()->role;

        if ($requiredRoleForAction = Role::tryFrom($role)) {
            return $userRole->value === $requiredRoleForAction->value ||
                $userRole->level() > $requiredRoleForAction->level();
        }

        throw new \UnexpectedValueException('Role name not found.');
    }
}
