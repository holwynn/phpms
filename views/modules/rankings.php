			<div class="col-lg-9 col-sm-9 col-xs-12">
				<div class="rankings-module">
					<h2 class="text-left">Rankings</h2>
					<table class="table table-bordered">
						<tr>
							<th>Job</th><th>Character</th><th>Level</th><th>Reborns</th>
						</tr>
						<?php foreach ($rankingList as $character): ?>
						<tr>
							<td class="td-job">
								<img src="/assets/images/jobs/<?php echo $character->job . '.png' ?>" alt="Job">
							</td>
							<td><?php echo $character->name ?></td>
							<td><?php echo $character->level ?></td>
							<td><?php echo $character->reborns ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>