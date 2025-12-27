<script lang="ts" setup>
import { useAuth } from '@/composables/useAuth';

const { user, logout } = useAuth();
</script>
<template>
	<div class="layout">
		<header>
			<div class="header-container">
				<h1>Syndicate</h1>

				<div class="header-buttons">
					<template v-if="user">
						<p>{{ user.name }}</p>
						<button @click="logout">exit</button>
					</template>
					<template v-else>
						<a href="/login">Login</a>
						<a href="/register">Register</a>
					</template>
				</div>
			</div>
		</header>
		<main>
			<div class="main-container">
				<slot />
			</div>
		</main>
	</div>
</template>