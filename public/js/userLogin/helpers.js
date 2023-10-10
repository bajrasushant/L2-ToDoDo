// export const AJAX = async function(url, loginData) {
// 	try {
// 		const token = localStorage.getItem('authToken');
// 		console.log('token', token);
// 		const res = await fetch(url, {
// 			method: 'POST',
// 			headers: {
// 				'Content-Type': 'application/json',
// 				'Authorization': `Bearer ${token}`,
// 			},
// 			body: JSON.stringify(loginData),
// 		});
//
// 		const data = await res.json();
//
// 		if (!res.ok) throw new Error(`${data.message} (${res.status})`);
// 		return data;
// 	} catch(err) {
// 		console.log(err.message);
// 		throw new Error(err.message);
// 	}
// }
