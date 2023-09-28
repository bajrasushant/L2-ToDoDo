class DropDownView {
	_selectElement = document.querySelector('.task__tag--new');

	populatedDropDown(projects) {
		projects.forEach(project => {
			const option = document.createElement('option');
			option.value = project.id;
			option.textContent = project.name;
			this._selectElement.appendChild(option);
		});
	}
}

export default new DropDownView();
