import { AJAX } from '../tododo/helpers.js';
import { USER_URL } from '../tododo/config.js';
export const userLogout = async function() {
	try {
		const res = await AJAX(`${USER_URL}/logout`, undefined, 'POST');
		if (res.status === 200) {
			localStorage.removeItem('authToken');
			window.location.assign('/');
		}
	} catch(err) {
		console.log(err.message);
		throw new Error(err.message);
	}
};
