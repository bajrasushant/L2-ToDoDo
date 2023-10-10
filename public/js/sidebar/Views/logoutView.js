class LogoutView {
	_parentElement = document.getElementById('logoutButton');

	addHandlerLogout(handler) {
		console.log('handler');
		this._parentElement.addEventListener('click', handler);
	}
};

export default new LogoutView();
