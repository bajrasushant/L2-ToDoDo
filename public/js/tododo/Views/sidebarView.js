class SidebarView {
    _sidebar = document.querySelector('.sidebar');
    _sidebarContainer = document.querySelector('.sidebar-container');
    _toggle = document.querySelector('.toggle');
    _project = document.querySelector('.project');

    constructor() {
        this._toggle.addEventListener('click', this.toggleSidebar.bind(this));
    }

    toggleSidebar() {
        this._sidebar.classList.toggle('close');
        this._sidebarContainer.classList.toggle('close');
        this._toggle.classList.toggle('rotate');
        this._project.classList.toggle('close');
    }
};

export default new SidebarView();
