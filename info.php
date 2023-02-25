$file = simplexml_load_file('data/absence.xml');
$data = $file->Enseignants->Enseignant;
?>
<table>
    <thead>
        <th>Numero de somme</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>CIN</th>

    </thead>
    <?php foreach($data as $prof) { ?>
	<tr>
		<td><?php echo $prof->NumSomme; ?></td>
		<td><?php echo $prof->Nom; ?></td>
		<td><?php echo $prof->Prenom; ?></td>
		<td><?php echo $prof->CIN; ?></td>
	</tr>
	<?php } ?>
</table>