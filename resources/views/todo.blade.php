@extends('layout')
@section('title', 'ToDODO|Board')
@section('scripts')
    <script type="module" src="{{ asset('js/controller.js') }}" defer></script>
@endsection
@section('content')
	<div class='app'>

@include('sidebar')

<main class='project'>
			<div class='project-info'>
				<h1>ToDODO</h1>
				<div class='project-participants'>
					<span></span>
					<span></span>
					<span></span>
					<button class='project-participants__add'>Add Participant</button>
				</div>
			</div>

			<div class='project-tasks'>

				<!-- TO DO COLUMN -->
				<div class='project-column todo'>
					<div class='project-column-heading'>
						<h2 class='project-column-heading__title'>TO DO</h2>
						<div class="buttons-container">
							<!-- Create new task button-->
							<button class='task__add' id="add__todo-btn">
								<!-- <span id="todo__plus-btn" class="material-icons-sharp add">add</span> -->
								<span id="todo__plus-btn" class="add">
									<svg><use href="/img/icons.svg#icon-add"></use></svg>
								</span>
							</button>

							<button class='project-column-heading__options'>
								<!-- <span class="material-icons-sharp">more_horiz</span> -->
								<span>
									<svg><use href="/img/icons.svg#icon-more_horiz"></use></svg>
								</span>
							</button>
						</div>
					</div>

<div class="add-todo-container">
						<div class="task underlay hidden">
							<div>
								<div class="task__tags">
									<select class="task__tag task__tag--new"></select>
								</div>
								<div class="title-calendar-input">
									<input type="text" id="todo-desc" required class="todo__desc-input" placeholder="Enter todo description">
									<input id="deadline-date" type="date" />
								</div>

							</div>
							<div class="create__todo">
                <button class='create__todo-btn' type="submit">Create</button>
              </div>
						</div>
						<!-- <p contenteditable="true" class="input-box"></p> -->
					</div>
					<div class="todo--container containers">
					</div>
				</div>



				<!-- IN PROGRESS COLUMN -->
				<div class='project-column progress'>
					<div class='project-column-heading'>
						<h2 class='project-column-heading__title'>In Progress</h2>
						<button class='project-column-heading__options'>
							<span>
								<svg><use href="/img/icons.svg#icon-more_horiz"></use></svg>
							</span>
						</button>
					</div>
					<div class='progress--container containers'>
					</div>
				</div>


				<!-- DONE COLUMN -->
				<div class='project-column done'>
					<div class='project-column-heading'>
						<h2 class='project-column-heading__title'>Done</h2>
						<button class='project-column-heading__options'>
							<span>
								<svg><use href="/img/icons.svg#icon-more_horiz"></use></svg>
							</span>
						</button>
					</div>
					<div class='done--container containers'>
					</div>
				</div>
				<div id="deleteOverlay"></div>
				<div id="editOverlay"></div>
			</div>

<!-- misc modals -->
					<div class="delete-confirm__container" id="delete__container"> <!-- add active here-->
						<div class="delete-modal-header">
							<div class="delete-modal-title">Delete Todo?</div>
							<button class="delete-close-button">&times;</button>
						</div>
						<div class="delete-modal-body">Are you sure you want to delete this todo item?</div>
						<div class="delete-modal-buttons">
							<button class="cancel-delete__btn">Cancel</button>
							<button class="confirm-delete__btn">Delete</button>
						</div>
					</div>

					<div class="edit-confirm__container" id="edit__container"> <!-- add active here-->
						<div class="edit-modal-header">
							<div class="edit-modal-title">edit Todo?</div>
							<button class="edit-close-button">&times;</button>
						</div>
						<div class="edit-modal-body">
							<div class="edit-title-input" contenteditable='true'></div>
							<input type="date" class="edit-calendar" contenteditable='true'></input>
						</div>
						<div class="edit-modal-buttons">
							<button class="cancel-edit__btn">Cancel</button>
							<button class="confirm-edit__btn">Done</button>
						</div>
					</div>
		</main>
</div>
@endsection
