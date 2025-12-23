<script lang="ts" setup>
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: ''
});

const submit = () => {
	form.post('/register', {
		onFinish: () => form.reset('password', 'password_confirmation'),
	});
};
</script>

<template>
	<h1>Register</h1>

	<form @submit.prevent="submit">
		<div>
			<label for="name">Full Name</label>
			<input v-model="form.name" type="text" id="name" required />
			<p v-if="form.errors.name" class="error">{{ form.errors.name }}</p>
		</div>
		<div>
			<label for="email">Email Address</label>
			<input v-model="form.email" type="email" id="email" required />
			<p v-if="form.errors.email" class="error">{{ form.errors.email }}</p>
		</div>
		<div>
			<label for="password">Password</label>
			<input v-model="form.password" type="password" id="password" required />
			<p v-if="form.errors.password" class="error">{{ form.errors.password }}</p>
		</div>
		<div>
			<label for="password_confirmation">Confirm Password</label>
			<input v-model="form.password_confirmation" type="password" id="password_confirmation" required />
		</div>

		<button type="submit" :disabled="form.processing">
			{{ form.processing ? 'Creating Account...' : 'Register' }}
		</button>

		<p>
			Already have an account?
			<Link href="/login">Log in here</Link>
		</p>
	</form>
</template>

<style scoped>
input {
	display: block;
	width: 100%;
	margin-bottom: 1rem;
	padding: 0.5rem;
}
</style>