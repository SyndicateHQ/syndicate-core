<script lang="ts" setup>
defineProps<{
	users: App.Data.UserData[];
}>();
</script>
<template>
	<p>hell on earth</p>

	<template v-for="user of users">
		<p>{{ user.id }} - {{ user.username }}</p>
	</template>
</template>