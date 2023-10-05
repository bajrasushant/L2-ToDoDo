class LogoutView {
	_parentElement = document.getElementById('logoutButton');

	addHandlerLogout(handler) {
		this._parentElement.addEventListener('click', handler);
	}
};

export default new LogoutView();
