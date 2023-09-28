<div class="add-todo-container">
						<div class="task underlay hidden">
							<div>
								<div class="task__tags">
									<select class="task__tag task__tag--new">
										@foreach($projects as $project)
											<option value="{{$project->id}}">{{$project->name}}</option>
										@endforeach
										</select>
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
