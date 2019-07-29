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
		<canvas id="pizza" class="loader"></canvas>
		<div class="col-sm-12">
			<table class="table table-striped table-responsive table-bordered align-middle border-danger">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Date</th>
					<th scope="col">Lieu d'intervention</th>
					<th scope="col">Horaires</th>
					<th scope="col">Type d'intervention</th>
					<th scope="col" style="width:100%">Commentaires</th>
					<!--<th scope="col">Total heures</th>-->
					<!--<th scope="col">Mod.</th>-->
					<th scope="col">Sup.</th>
					</tr>
				</thead>
				<tbody id="bodyHoraire">
				</tbody>
			</table>
		</div>
		<!--------  STATS -------->
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="card bg-light border-danger">
				<div class="card-body">
				<div class="row">
					<div class="col-10">Total d'heure travaillée :</div>
					<div class="col-2"><i class="far fa-clock text-danger" style="font-size : 24px;"></i></div>
				</div>
				<div class="row">
					<div class="col-12"><h2 class="card-subtitle mb-2 text-danger" id="totalHeures"></h2></div>
				</div>
			</div>
		</div>

		<!--------  ENVOYER -------->
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 mt-4 mb-4">
				<a id="envoyerPDFButton" class="btn btn-danger" href="#" role="button" onclick="genPdf()">Envoyer</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal NEW -->
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
			class="form-control" name="date_declaration" id="date_declaration" aria-describedby="helpId" placeholder="1999/12/25" require>
		  <small id="helpId" class="form-text text-muted">aaaa/mm/dd</small>
		</div>
		<div class="form-group">
		  <label for="horaire_declaration">Nombres d'heures travaillées<sup>*</sup></label>
		  <input type="time"
			class="form-control" name="horaire_declaration" id="horaire_declaration" aria-describedby="helpId" placeholder="12:00">
		  <small id="helpId" class="form-text text-muted">hh:mm</small>
		</div>
		<div class="form-group">
		  <label for="lieu_declaration">Lieux<sup>*</sup></label>
		  <select class="form-control" name="lieu_declaration" id="lieu_declaration">
		  </select>
		  <small id="helpId" class="form-text text-muted">Si "Autres" précisez en commentaire</small>
		</div>
		<div class="form-group">
		  <label for="type_declaration">Type d'action<sup>*</sup></label>
		  <select class="form-control" name="type_declaration" id="type_declaration">
		  </select>
		</div>
		<div class="form-group">
		  <label for="commentaire_declaration">Commentaire</label>
		  <input type="text" class="form-control" name="commentaire_declaration" id="commentaire_declaration" aria-describedby="helpId" placeholder="Commentaires">
		</div>
		<small id="helpId" class="form-text text-muted">* champs obligatoires</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="newDecla()">Valider</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteDecla" tabindex="-1" role="dialog" aria-labelledby="deleteDeclaa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDeclaa">Supprimer la déclaration ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer la déclaration ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button id="validDeleteButton" type="button" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<?php include 'Control/all/loader.php' ?>
<script src="Control/horaire/DateFormat.js"></script>
<script>

function genPdf(){
	window.location.href = "Control/horaire/genPDF.php?month=" + $("#inputStateMonth").val() + "&year=" + $("#inputStateYear").val();
}

function getTotalHourMonth(){
	var url = 'Control/horaire/getTotalHourMonth.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'GET', // Le type de la requête HTTP.
		data : 'month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val(),
		success : function(json, statut){
			jQuery.each(json, function() {
				var timeHour = this.timeSum;
				if (timeHour == null){
					$("#totalHeures").text("0h");
				}
				else{
					var formatTime = (timeHour.substring(0, 5).replace(":","h "))+"min";
					$("#totalHeures").text(formatTime);	
				}
			});
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){

		}
	});
}

/* function edit(){
	var obj = {"idToGet":idToGet};
	var jsonValue = JSON.stringify(obj);
	
	var url = 'Control/horaire/getAllValue.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'POST', // Le type de la requête HTTP.
		data: jsonValue,
		dataType : 'text',
		success : function(json, statut){
			//alert(json);
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
			jQuery.each(json, function() {
				$('#date_declaration').value(this.date);
			});
		}
	});
} */

function deleteHoraire(idTodelete){
	var obj = {"idToDelete":idTodelete};
	var jsonValue = JSON.stringify(obj);
	
	var url = 'Control/horaire/deleteValue.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'POST', // Le type de la requête HTTP.
		data: jsonValue,
		dataType : 'text',
		success : function(json, statut){
			//alert(json);
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
			reloadTable();
		}
	});
}

function completeTypeModalForm(){
	var url = 'Control/horaire/getValueType.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'GET', // Le type de la requête HTTP.
		//dataType : 'json',
		success : function(json, statut){
			jQuery.each(json, function() {
				$("#type_declaration").append(new Option(this.nomTypeInter, this.idTypeInter));
			});
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){

		}
	});
}

function completeLieuModalForm(){
	var url = 'Control/horaire/getValueLieu.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'GET', // Le type de la requête HTTP.
		//dataType : 'json',
		success : function(json, statut){
			jQuery.each(json, function() {
				$("#lieu_declaration").append(new Option(this.nomLieuInter, this.idLieuInter));
			});
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){

		}
	});
}


$('#deleteDecla').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('idecla') 
  var modal = $(this)
  modal.find('#validDeleteButton').attr("onClick","deleteHoraire("+recipient+")")
});

function reloadTable(){
	$('#bodyHoraire').empty();
	var url = 'Control/horaire/selectHoraireValue.php';
	$.ajax({
       url : url,
       type : 'GET',
       data : 'month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val(),
	   //dataType : 'json',
	   success : function(json, statut){
			if (json === undefined || json.length == 0) {
				$("#bodyHoraire").append('<tr><td colspan="8">Aucun horraire de définit !</td></tr>');
			}
			var i = 1;
			jQuery.each(json, function() {
				var index = "horraire"+i;
				var date = $.format.date(this.dateHoraire+" 00:00:00", "E dd MMM yy");
				$("#bodyHoraire").append('<tr id="'+index+'" ></tr>');
				$("#"+index).append('<td>'+i+'</td>');
				$("#"+index).append('<td class="autoSizing">'+date+'</td>');
				$("#"+index).append('<td class="autoSizing">'+this.nomLieuInter+'</td>');
				$("#"+index).append('<td class="autoSizing text-center">'+(this.timeHoraire).slice(0,-3)+'</td>');
				$("#"+index).append('<td class="autoSizing">'+this.nomTypeInter+'</td>');
				$("#"+index).append('<td>'+this.comHoraire+'</td>');
				//$("#"+index).append('<td class="align-middle"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editDecal" data-idecla="'+this.idHoraire+'"><i class="fas fa-edit text-white" onClick="edit('+this.idHoraire+')"></i></td>');
				$("#"+index).append('<td class="align-middle"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteDecla" data-idecla="'+this.idHoraire+'"><i class="fas fa-trash text-white" ></i></button></td>');
				
				i = i + 1;
			});
			getTotalHourMonth();
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
	
		}
    });
}

function newDecla(){
	var dateDecla = $("#date_declaration").val();
	var horaireDecla = $("#horaire_declaration").val()+":00";
	var lieuDecla = $("#lieu_declaration").val();
	var typeDecla = $("#type_declaration").val();
	var comDecla = $("#commentaire_declaration").val();
	var dateDeclaFormated = dateDecla.replace(/\//g, '-');

	var obj = {"dateDecla":dateDeclaFormated,"horaireDecla":horaireDecla,"lieuDecla":lieuDecla,"typeDecla":typeDecla,"comDecla":comDecla};
	var jsonValue = JSON.stringify(obj);
	
	var url = 'Control/horaire/insertValue.php';
	$.ajax({
		url : url, 
		type : 'POST',
		data: jsonValue,
		dataType : 'text',
		success : function(json, statut){
			//alert(json);
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
			reloadTable();
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