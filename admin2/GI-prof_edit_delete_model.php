<!-- Edit -->


<!-- Delete Enseignant -->
<div class="modal fade" id="delete_<?php echo $etud->NumSomme; ?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		   <div class="modal-header">
				
					<h4 class="modal-title" id="myModalLabel">Supprimer un enseignant</h4>
				
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $etud->Nom.' '.$etud->Prenom; ?></h2>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Annuler</button>
				<a href="Gi-prof-delete.php?NumSomme=<?php echo $etud->NumSomme; ?>" class="btn btn-danger"><span
						class="glyphicon glyphicon-trash"></span> Oui</a>
			</div>

		</div>
	</div>
</div>

<!-- Delete Etudiant-->
