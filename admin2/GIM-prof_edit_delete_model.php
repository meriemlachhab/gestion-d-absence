<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $etud->NumSomme; ?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">Modifier</h4>
				</center>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="edit.php">

						<div class="row ">


							<div class="col">
								<div class="mb-3"><label class="col-form-label" style="position:relative; top:7px;">Num De
										Somme:</label>

									<input type="text" class="form-control" name="NumSomme"
										value="<?php echo $etud->NumSomme; ?>" readonly>
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label class="col-form-label" style="position:relative; top:7px;">CIN:</label>
								
									<input type="text" class="form-control" name="CIN" value="<?php echo $etud->CIN; ?>">
								</div>
							</div>

						</div>

						
						<div class="row ">
						    <div class="col">
								<div class="mb-3">
									<label class="col-form-label" style="position:relative; top:7px;">Nom:</label>
								
									<input type="text" class="form-control" name="Nom" value="<?php echo $etud->Nom; ?>">
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label class="col-form-label" style="position:relative; top:7px;">Prenom:</label>
								
									<input type="text" class="form-control" name="Prenom"
										value="<?php echo $etud->Prenom; ?>">
								</div>
							</div>
							
						</div>
						
						<div class="row ">
							<div class="col">
								<div class="mb-3">
									<label class="col-form-label" style="position:relative; top:7px;">Tele:</label>
								
									<input type="text" class="form-control" name="Tele" value="<?php echo $etud->Tele; ?>">
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label class="col-form-label" style="position:relative; top:7px;">Email:</label>
								
									<input type="text" class="form-control" name="Email"
										value="<?php echo $etud->Email; ?>">
								</div>
							</div>
							
						</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="edit" class="btn btn-primary">Modifier</button>
			</div>
		</div>

	</div>
</div>
</div>

<!-- Delete Enseignant -->
<div class="modal fade" id="delete1_<?php echo $etud->NumSomme; ?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		   <div class="modal-header">
				
					<h4 class="modal-title" id="myModalLabel">Supprimer un enseignant</h4>
				
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p class="text-center">Etes-vous sur de supprimer</p>
				<h2 class="text-center"><?php echo $etud->Nom.' '.$etud->Prenom; ?></h2>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Annuler</button>
				<a href="GIM-prof-delete.php?NumSomme=<?php echo $etud->NumSomme; ?>" class="btn btn-danger"><span
						class="glyphicon glyphicon-trash"></span> Oui</a>
			</div>

		</div>
	</div>
</div>

<!-- Delete Etudiant-->
