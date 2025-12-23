<script lang="ts" setup>
import { router } from '@inertiajs/vue3';

import { useAuth } from '@/composables/useAuth';

defineProps<{
	users: App.Data.UserData[];
}>();

const { user, logout } = useAuth();
console.log(user);
</script>
<template>
	<div class="header">
		<template v-if="user">
			<p>{{ user.email }} {{ user.name }}</p>
			<button @click="logout">logout</button>
		</template>
		<template v-else>
			<a href="/login">Login</a>
			<a href="/register">Register</a>
		</template>
	</div>
	<p>hell on earth</p>

	<template v-for="user of users">
		<p>{{ user.id }} - {{ user.name }}</p>
	</template>
</template>
<style lang="scss" scoped>
.header {
	display: flex;
	justify-content: space-between;
	width: 100%;
	padding: 1rem;
	background-color: rgb(211, 211, 211);
}
</style>