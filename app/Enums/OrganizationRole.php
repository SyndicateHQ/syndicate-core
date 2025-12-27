<?php

namespace App\Enums;

enum OrganizationRole: string
{
	case Owner = 'owner';
	case Admin = 'admin';
	case Member = 'member';

	public static function values(): array
	{
		return array_column(self::cases(), 'value');
	}
}
