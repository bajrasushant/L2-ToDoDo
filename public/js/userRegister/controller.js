document.addEventListener('DOMContentLoaded', function() {
	document.getElementById('registerForm').addEventListener('submit', async function(e) {
		e.preventDefault();
		const name = document.getElementById('usernameField').value;
		const email = document.getElementById('emailField').value;
		const password = document.getElementById('passwordField').value;
		const data = { name, email, password };
		// error handling front end validation left
		try {
			const res = await fetch('http://localhost:8000/api/user/register', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json',
				},
				body: JSON.stringify(data),
			});

			const dataRes = await res.json();
			if (dataRes.status === 200) {
				window.location.assign('/user/login');
			}
			else if (dataRes.status === 401) {
				document.getElementById('error').innerHTML = dataRes.message;
			}
		}	catch(err) {
			console.log(err.message);
			document.getElementById('error').innerHTML = err.message;
		}
	});
});
