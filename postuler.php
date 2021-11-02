<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HACKATHON-PTN</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="./src/style.css">

</head>

<body>
    
    <div class="container">
        <div class="card bg form_postuler">

            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="prenom" type="text" class="validate">
                <label for="prenom">Prenom</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" type="text" class="validate">
                <label for="nom">Nom</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">call</i>
                <input id="telephone" type="text" class="validate">
                <label for="telephone">Telephone</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">mail</i>
                <input id="Email" type="text" class="validate">
                <label for="Email">Email</label>
            </div>

            <div class="input-field">
                <select id="secteur">
                    <option value="" disabled selected>Choisir</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Secteur d'activite</label>
            </div>

            <div class="input-field">
                <select id="domaine">
                    <option value="" disabled selected>Choisir</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Le (s) Domaine(s)</label>
            </div>
            <p>
                <label>
                    <input type="checkbox" id="checkbox" />
                    <span>J'accepte les termes et conditions ... </span>
                </label>
            </p>
            <div class="center">
                <div class=" preloader-wrapper big active chargement_postuler">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center">
                <button class="waves-effect waves-light btn btn_envoyer" onclick="postuler()"><i class="material-icons left">cloud</i>Envoyer</button>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br>
    <!-- footer -->
    <?php
   // require_once 'sections/footer.php';
    ?>
</body>
<script src="main.js"></script>


<script type="text/javascript">
    function toast(message) {
        M.toast({
            html: message,
            classes: "bg_nav"
        })
    }
    // toast("fghjklmkjhgfghjlm")
    $(".chargement_postuler").hide()

    function sending_postule() {
        $(".chargement_postuler").show()
        $(".btn_envoyer").addClass("disabled");
    }

    function end_sending_postule() {
        $(".chargement_postuler").hide()
        $(".btn_envoyer").removeClass("disabled");
    }

    function vider_champ() {
        $("#prenom").val("");
        $("#nom").val("");
        $("#email").val("");
        $("#telephone").val("");
    }

    function postuler() {
        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var email = document.getElementById("Email").value
        var telephone = document.getElementById("telephone").value;
        var secteur = document.getElementById("secteur").value;
        var domaine = document.getElementById("domaine").value;
        var politique = document.getElementById("checkbox").value;
        if (prenom.trim() == "" || nom.trim() == "" || email.trim() == "" || telephone.trim() == "") {

            if (nom == '') {
                document.getElementById("nom").style.borderColor = "red";
                return false;
            } else {
                document.getElementById("nom").style.borderColor = "green";

            }
            if (prenom == '') {
                document.getElementById("prenom").style.borderColor = "red";
                return false;
            } else {
                document.getElementById("prenom").style.borderColor = "green";

            }
            if (telephone == '') {
                document.getElementById("telephone").style.borderColor = "red";
                return false;
            } else {
                document.getElementById("telephone").style.borderColor = "green";

            }
            if (email == '') {
                document.getElementById("Email").style.borderColor = "red";
                return false;
            } else {
                document.getElementById("Email").style.borderColor = "green";

            }
        } else {
            sending_postule()
            var donnees = {
                code: "0101234567890163668TEC-IT",
                form: {
                    p: prenom,
                    n: nom,
                    e: email,
                    t: telephone
                }
            }
            $.ajax({
                type: 'POST',
                url: "traitement/traitement.php",
                data: donnees,
                dataType: 'json',
                success: function(result) {
                    end_sending_postule()
                    vider_champ()
                    toast(result.message)
                    console.log(result)
                },
                error: function(result) {
                    end_sending_postule()
                    console.log(result)
                    toast("Erreur")
                }
            })
        }
    }
</script>

</html>