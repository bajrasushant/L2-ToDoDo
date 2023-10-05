// import loginView from "./Views/loginView.js";
// import RenderMessageView from "./Views/renderMessageView.js";
// import * as model from './model.js';
//
// const controlLogin = async function(data) {
// 	try {
// 	const res = await model.userLogin(data);
// 		console.log(res);
// 		const token = res.token;
// 		localStorage.setItem('authToken', token);
//
// 		if(res.redirect) {
// 			console.log('redirect', res.redirect);
// 			window.location.href = res.redirect;
// 		}else{
// 			console.log('User not authenticated');
// 		}
// 	}catch(err){
// 		RenderMessageView.renderError(err.message);
// 	}
// };
//
//
// const init = function() {
// 	loginView.addHandlerLogin(controlLogin);
// };
//
// init();

document.addEventListener('DOMContentLoaded', function() {
	document.getElementById('loginForm').addEventListener('submit', async function(e) {
		e.preventDefault();
		const email = document.getElementById('email').value;
		const password = document.getElementById('password').value;
		const data = { email, password };
		try {
			const res = await fetch('http://localhost:8000/api/user/login', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json',
				},
				body: JSON.stringify(data),
			});

			const dataRes = await res.json();
			console.log(dataRes);

			if (dataRes.status === 200) {
				const token = dataRes.token;
				localStorage.setItem('authToken', token);


				if (dataRes.redirect) {
					const redirectRes = await fetch(dataRes.redirect, {
						method: 'GET',
						headers: {
							'Authorization': `Bearer ${token}`,
						},
					});

					if (redirectRes.ok) {
						console.log(redirectRes);
						window.location.href = dataRes.redirect;
					} else {
						console.log('redirectRes not ok');
					}
				} else {
					console.log('User not authenticated');
				}
			} else {
				console.log('User not authenticated');
			}

		} catch (err) {
			console.log(err.message);
		}
	}
	);
});

