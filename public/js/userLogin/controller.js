import loginView from "./Views/loginView.js";
import RenderMessageView from "./Views/renderMessageView.js";
import * as model from './model.js';

const controlLogin = async function(data) {
	try {
	await model.userLogin(data);
	}catch(err){
		RenderMessageView.renderError(err.message);
	}
};


const init = function() {
	loginView.addHandlerLogin(controlLogin);
};

init();
