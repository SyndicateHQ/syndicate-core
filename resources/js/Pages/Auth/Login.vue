<script lang="ts" setup>
import { useForm, usePage } from '@inertiajs/vue3';

const form = useForm({
	email: '',
	password: '',
	remember: false,
});

const submit = () => {
    form.post('/login');
};
</script>

<template>
	<div class="login-container">
		<h1>Login</h1>

		<form @submit.prevent="submit">
			<div v-if="form.errors.email" class="text-error">
				{{ form.errors.email }}
			</div>
			<input v-model="form.email" type="email" placeholder="Email" required />
			<input v-model="form.password" type="password" placeholder="Password" required />
			<label>
				<input type="checkbox" v-model="form.remember" /> Remember Me
			</label>
			<button type="submit" :disabled="form.processing">
				{{ form.processing ? 'Logging in...' : 'Login' }}
			</button>
		</form>
	</div>
</template>