<?php

namespace App\Enums;

enum OrganizationMemberStatus: string
{
	case Pending = 'pending';
	case Joined  = 'joined';

	public static function values(): array
	{
		return array_column(self::cases(), 'value');
	}
}
