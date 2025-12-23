import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

import { router } from '@inertiajs/vue3';

export function useAuth() {
	const page = usePage();
	const user = computed(() => page.props.auth.user);
	const isLoggedIn = computed(() => !!page.props.auth.user);

	const logout = () => {
		router.post('/logout');
	}
	return { user, isLoggedIn, logout };
}