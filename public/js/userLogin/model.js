import {AJAX} from './helpers.js';
import {API_URL} from './config.js';

export const userLogin = async function(data) {
	try {
		const res = await AJAX(`${API_URL}/login`, data);
		const token = res.token;
		console.log(token);
		localStorage.setItem('authToken', token);
		window.location.assign('/todo');
	} catch(err) {
		console.log(err.message);
		throw new Error(err.message);
	}
}

