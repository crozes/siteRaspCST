<script type="text/javascript">
	var jsonEffectifs;
	var cpt = 0;

	$("#prec").prop("disabled",true);

	function verificationButton(){
		if(cpt <= 0){
			$("#prec").prop("disabled",true);
		}
		else if(cpt >= jsonEffectifs.length-1){
			$("#skip").prop("disabled",true);
		}
		else if(jsonEffectifs.length-1 == 0){
			$("#skip").prop("disabled",true);
		}
		else{
			$("#prec").prop("disabled",false);
			$("#skip").prop("disabled",false);
		}
	}

	function completeForm(){
		if(jsonEffectifs.length <= 0){
			alert("Aucune personne à licencier dans le tableur");
			$("#bottom").addClass("d-none");
		}
		else{
			console.log("completeForm function cpt : "+ cpt);
			completeFormWithElement(jsonEffectifs[cpt]);
			verificationButton();
		}
	}

	function skip(){
		if(cpt < jsonEffectifs.length-1)
			cpt ++;
		console.log("Skip function cpt : "+ cpt);
		completeFormWithElement(jsonEffectifs[cpt]);
		verificationButton();
	}

	function prec(){
		if(cpt > 0)
			cpt --;
		console.log("Skip function cpt : "+ cpt);
		completeFormWithElement(jsonEffectifs[cpt]);
		verificationButton();
	}

	$("#skip").click(function(){
		skip();
	});

	$("#prec").click(function(){
		prec();
	});

	function completeFormWithElement(array){
		$('#nom').val(array['Nom']);
		$('#prenom').val(array['Prenom']);
		if(array['Sexe'] == 'Un homme'){
			$('#sexe').val('Homme');
		}
		else if(array['Sexe'] == 'Une femme'){
			$('#sexe').val('Femme');
		}
		$('#dateNaissance').val(array['DateNaissance']);
		$('#lieuNaissance').val(array['LieuNaissance']);
		$('#adresse').val(array['Adresse']);
		$('#adresse_suite').val(array['Adresse2']);
		$('#code_postal').val(array['CodePostal']);
		$('#ville').val(array['Ville']);
		$('#telephone').val(array['Telephone']);
		$('#portable').val(array['Portable']);
		$('#email').val(array['Mail']);
	}

	$('#btnGenerate').click(function(event) {
		$('#pizza').show()
		var lien = $('#lienGoogle').val();
		var idGoogleSheet = lien.split('/').slice(-2)[0];
		// Definir le lien
		var url = "http://78.249.92.32:5000/sheetID/"+idGoogleSheet;
		$.get(url, function(data, status){
			//alert("Status: " + status);
			$('#pizza').hide();
           	jsonEffectifs = data;
        })
		.done(function() {
			$("#bottom").removeClass("d-none");
			$("#nbrLicencier").text(jsonEffectifs.length);
			completeForm();
		})
		.fail(function() {
			$('#pizza').hide()
			alert( "Probleme de connection au Serveur" );
		})
	});
</script>