class LoginView {
	_parentElement = document.getElementById('loginForm');

	addHandlerLogin(handler) {
		this._parentElement.addEventListener('submit', function(e) {
			e.preventDefault();
			console.log(this);
			const dataArr = [...new FormData(this)];
			const data = Object.fromEntries(dataArr);
			console.log(data);
			handler(data);
		});
	}
};

export default new LoginView();
