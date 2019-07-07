<div class="jumbotron jumbotron-fluid bg-danger text-white">
	<div class="container">
		<h1 class="display-3">Déclaration des heures</h1>
		<p class="lead">Outil de déclaration des heures faites</p>
	</div>
</div>
<div class="container">
	<div class="row">
	<div class="col-sm-3">
			<div id="mois" class="dropdown mb-4">
				<label for="inputStateMonth">Mois :</label>
				<select id="inputStateMonth" class="form-control" onchange="reloadTable()">
					<option value="01">Janvier</option>
					<option value="02">Février</option>
					<option value="03">Mars</option>
					<option value="04">Avril</option>
					<option value="05">Mai</option>
					<option value="06">Juin</option>
					<option value="07">Juillet</option>
					<option value="08">Août</option>
					<option value="09">Septembre</option>
					<option value="10">Octobre</option>
					<option value="11">Novembre</option>
					<option value="12">Décembre</option>
				</select>
			</div>
		</div>
		<div class="col-sm-3">
			<div id="years" class="dropdown mb-4">
				<label for="inputStateYear">Année :</label>
				<select id="inputStateYear" class="form-control" onchange="reloadTable()">
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
				</select>
			</div>
		</div>
		<div class="col-sm-12 mb-4">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nouvelDecla">
				Nouveau
			</button>
		</div>
		<div class="col-sm-12">
			<table class="table table-striped">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Date</th>
					<th scope="col">Lieu d'intervention</th>
					<th scope="col">Horaires</th>
					<th scope="col">Type d'intervention</th>
					<th scope="col">Commentaires</th>
					<!--<th scope="col">Total heures</th>-->
					<th scope="col">Mod.</th>
					<th scope="col">Sup.</th>
					</tr>
				</thead>
				<tbody id="bodyHoraire">
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="nouvelDecla" tabindex="-1" role="dialog" aria-labelledby="nouvelDeclaration" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle déclaration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		  <label for="date">Date<sup>*</sup></label>
		  <input type="date"
			class="form-control" name="date_declaration" id="date_declaration" aria-describedby="helpId" placeholder="">
		  <small id="helpId" class="form-text text-muted">aaaa-mm-dd</small>
		</div>
		<div class="form-group">
		  <label for="horaireDecla">Horaire<sup>*</sup></label>
		  <input type="time"
			class="form-control" name="horaire_declaration" id="horaireDecla" aria-describedby="helpId" placeholder="">
		  <small id="helpId" class="form-text text-muted">hh:mm:ss</small>
		</div>
		<div class="form-group">
		  <label for="lieuDecla">Lieux<sup>*</sup></label>
		  <select class="form-control" name="lieu_declaration" id="lieuDecla">
		  </select>
		  <small id="helpId" class="form-text text-muted">Si "Autres" précisez en commentaire</small>
		</div>
		<div class="form-group">
		  <label for="typeDecla">Type d'action<sup>*</sup></label>
		  <select class="form-control" name="type_declaration" id="typeDecla">
		  </select>
		</div>
		<div class="form-group">
		  <label for="comDecla">Commentaire</label>
		  <input type="text" class="form-control" name="commentaire_declaration" id="comDecla" aria-describedby="helpId" placeholder="Commentaires">
		</div>
		<small id="helpId" class="form-text text-muted">* champs obligatoires</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>

<script>
function edit(){
	alert("push");
}

function deleteHoraire(idTodelete){
	alert("delete");
}

function completeTypeModalForm(){
	var url = 'Control/horaire/getValueType.php';
	//alert('month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val());
	$.ajax({
		url : url, // La ressource ciblée
		type : 'GET', // Le type de la requête HTTP.
		dataType : 'json',
		success : function(json, statut){
			jQuery.each(json, function() {
				//$('#lieuDecla').append('<option value="'+this.idLieuInter+'">'+this.nomLieuInter+'</option>');
				$("#typeDecla").append(new Option(this.nomTypeInter, this.idTypeInter));
			});
		},
		error : function(resultat, statut, erreur){
			alert(resultat);
		},
		complete : function(resultat, statut){

		}
	});
}

function completeLieuModalForm(){
	var url = 'Control/horaire/getValueLieu.php';
	//alert('month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val());
	$.ajax({
		url : url, // La ressource ciblée
		type : 'GET', // Le type de la requête HTTP.
		dataType : 'json',
		success : function(json, statut){
			jQuery.each(json, function() {
				//$('#lieuDecla').append('<option value="'+this.idLieuInter+'">'+this.nomLieuInter+'</option>');
				$("#lieuDecla").append(new Option(this.nomLieuInter, this.idLieuInter));
			});
		},
		error : function(resultat, statut, erreur){
			alert(resultat);
		},
		complete : function(resultat, statut){

		}
	});
}

function reloadTable(){
	$('#bodyHoraire').empty();
	var url = 'Control/horaire/selectHoraireValue.php';
	//alert('month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val());
	$.ajax({
       url : url, // La ressource ciblée
       type : 'GET', // Le type de la requête HTTP.
       data : 'month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val(),
	   dataType : 'json',
	   success : function(json, statut){ // code_html contient le HTML renvoyé
			if (json === undefined || json.length == 0) {
				$("#bodyHoraire").append('<tr><td colspan="8">Aucun horraire de définit !</td></tr>');
			}
			var i = 1;
			jQuery.each(json, function() {
				var index = "horraire"+i;

				$("#bodyHoraire").append('<tr id="'+index+'" ></tr>');
				$("#"+index).append('<td>'+i+'</td>');
				$("#"+index).append('<td class="autoSizing">'+this.dateHoraire+'</td>');
				$("#"+index).append('<td class="autoSizing">'+this.nomLieuInter+'</td>');
				$("#"+index).append('<td class="autoSizing">'+this.timeHoraire+'</td>');
				$("#"+index).append('<td class="autoSizing">'+this.nomTypeInter+'</td>');
				$("#"+index).append('<td>'+this.comHoraire+'</td>');
				$("#"+index).append('<td class="text-center"><i class="fas fa-edit text-primary editStyle" onClick="edit()"></i></td>');
				$("#"+index).append('<td class="text-center"><i class="fas fa-trash text-danger deleteStyle" onClick="deleteHoraire('+this.idHoraire+')"></i></td>');

				i = i + 1;
			});
		},
		error : function(resultat, statut, erreur){
			alert(resultat);
		},
		complete : function(resultat, statut){
	
		}
    });
}

$( document ).ready(function() {
    var time = new Date();
	var month = ("0" + (time.getMonth() + 1)).slice(-2);
	var year = time.getFullYear();
	$("#inputStateMonth").val(month);
	$("#inputStateYear").val(year);
	reloadTable();
	completeLieuModalForm();
	completeTypeModalForm();
});
</script>