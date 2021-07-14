<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier projet de formation</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" /></script>
    
</head>
<body>

    <h1>Accueil</h1>

    <video id="sourcevid" height='150' width='150' autoplay="true"  style='display:inline;border-radius:20px'></video>
    <button onclick='clone()' style='height:50px;width:50px;margin:auto;border-radius:15px;'>&#128247;</button><br>
		
		<div id="main" style='height:150px;width:150px;margin:auto;display:inline'>
		
            <canvas id="cvs" height='150' width='150'></canvas>
		
		</div>

    <form action="" method="post" name="visitor">
        <h2>Veuillez compléter :</h2>
        <input type="text" name="nom" placeholder="Votre Nom"><br><br>
        <input type="text" name="prenom" placeholder="Votre Prénom"><br><br>
        <input type="email" name="email" placeholder="&#9993; Votre adresse email"><br><br>
        <label for="visit-options">Raison de votre visite :</label><br><br>
        <select name="visit-options" id="visit-options">
            <option value="formation">Suivre une formation</option>
            <option value="appointment" data-id='#champ1'>Rendez-vous avec un membre du personnel</option>
        </select><br><br>
        <div class="label champ" id="champ1"><p>Nom de la personne :</p><input type="search" class="search" placeholder="&#x1F464;"></div><br><br>
        <input type="hidden" class="userKey">
        <ul class="serp">
        </ul>
        <button>Next ></button>
    </form>
    <script type="text/javascript">


function init() {

    navigator.mediaDevices.getUserMedia({ audio: false, video: { width: 800, height: 600 } }).then(function(mediaStream) {

        var video = document.getElementById('sourcevid');
        video.srcObject = mediaStream;
        
        video.onloadedmetadata = function(e) {
            video.play();
        };

    }).catch(function(err) { console.log(err.name + ": " + err.message); });

}

function clone(){
    var vivi = document.getElementById('sourcevid');
    var canvas1 = document.getElementById('cvs').getContext('2d');
    canvas1.drawImage(vivi, 0,0, 150, 112);
    var base64=document.getElementById('cvs').toDataURL("image/png");	//l'image au format base 64
    document.getElementById('tar').value='';
    document.getElementById('tar').value=base64;
}

window.onload = init;
        $(document).ready(function() {
            $('.champ').hide(); // on cache les champ par défaut
            
            $('select[name="visit-options"]').change(function() { // lorsqu'on change de valeur dans la liste
                $('.champ').hide();
                var truc = $(this).find('option:selected').attr('data-id');
                $(truc).show();
            });
        });
//let array1 = []
//
//axios.get("https://firestore.googleapis.com/v1/projects/ingrwf09/databases/(default)/documents/personnel")
//.then(response => {
//    array1 = response.data.documents
//})
//.catch (error => console.log(error))
//
//    let serp = document.querySelector(".serp")
//
//    let inputSearch = document.querySelector(".search")
//
//inputSearch.addEventListener("keyup", (e) => {
//    serp.innerHTML = ''
//    e.preventDefault
//    let keyword = e.target.value
//    if(keyword.length > 2){
//        array1.forEach(item => {
//        //console.log(item.fields.prenom.stringValue, item.fields.prenom.stringValue.search(keyword))
//        if ((item.fields.prenom.stringValue.toLowerCase().search(keyword.toLowerCase()) >= 0) || (item.fields.nom.stringValue.toLowerCase().search(keyword.toLowerCase()) >= 0))
//            serp.innerHTML += `
//            <li class="serp-item" data-id="${item.name}">
//                ${item.fields.prenom.stringValue} ${item.fields.nom.stringValue}
//            </li>
//            `
//        })
//    }
//})

//serp.addEventListener("click", (e) => {
//    e.preventDefault
//    console.log(e.target)
//    if(e.target.classList.contains("serp-item")) {
//        inputSearch.value = e.target.innerText
//        document.querySelector(".userKey").value=e.target.dataset.id
//        
//    }
//})

</script>    
</body>
</html>