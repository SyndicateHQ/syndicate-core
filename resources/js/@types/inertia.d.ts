import { PageProps as InertiaPageProps } from '@inertiajs/core';

export interface AuthUser {
	id: string;
	name: string;
	email: string;
}

declare module '@inertiajs/core' {
	interface PageProps extends InertiaPageProps {
		auth: {
			user: AuthUser | null;
		};
		errors: Record<string, string>;
	}
}