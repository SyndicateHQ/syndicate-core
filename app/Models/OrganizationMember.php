<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\OrganizationMemberStatus;

class OrganizationMember extends Model
{

	protected static function boot()
	{
		static::updating(function (OrganizationMember $member) {
			if (
				$member->isDirty('status') &&
				$member->getOriginal('status') === OrganizationMemberStatus::Pending &&
				$member->status === OrganizationMemberStatus::Joined
			) {
				$member->joined_at = now();
			}
		});
	}
}
