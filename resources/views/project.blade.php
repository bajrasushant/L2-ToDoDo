@extends('layout')
@section('title', 'ToDODO|Projects')
@section('content')
	<div class='app'>

@include('sidebar')

<main class='project'>
			<div class='project-info'>
				<h1>ToDODO | Projects</h1>
				<div class='project-participants'>
					<span></span>
					<span></span>
					<span></span>
					<button class='project-participants__add'>Add Participant</button>
				</div>
			</div>

			<div class='project-tasks'>
				<div class='project-column'>
					<div class='project-column-heading'>
						<h2 class='project-column-heading__title'>Pending</h2>
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

<div class="add-project-container">
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
					<div class="ongoing--container containers">
					</div>
				</div>



				<!-- IN PROGRESS COLUMN -->
				<div class='project-column progress'>
					<div class='project-column-heading'>
						<h2 class='project-column-heading__title'>On Going</h2>
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
<!-- modals place -->
				@include('modals');
				<div id="deleteOverlay"></div>
				<div id="editOverlay"></div>
			</div>
		</main>
</div>
@endsection
