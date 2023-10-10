import logoutView from './Views/logoutView.js';
import sidebarView from './Views/sidebarView.js';
import {userLogout} from './model.js';

const controlLogout = async function() {
	try {
		await userLogout();
	}catch(err){
		console.log(err.message);
	}
};

const init = function() {
	logoutView.addHandlerLogout(controlLogout);
	sidebarView.toggleSidebar();
};

init();
