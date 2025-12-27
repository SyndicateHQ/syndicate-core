<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\OrganizationRole;
use App\Enums\OrganizationMemberStatus;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('organization_members', function (Blueprint $table) {
			$table->uuid('id')->primary();

			$table->uuid('user_id');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->cascadeOnDelete();

			$table->uuid('organization_id');
			$table->foreign('organization_id')
				->references('id')
				->on('organizations')
				->cascadeOnDelete();

			$table->enum('role', OrganizationRole::values())
				->default(OrganizationRole::Member->value);

			$table->enum('status', OrganizationMemberStatus::values())
				->default(OrganizationMemberStatus::Pending->value);

			$table->timestamp('joined_at')->nullable();

			$table->unique(['user_id', 'organization_id']);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('organization_members');
	}
};
