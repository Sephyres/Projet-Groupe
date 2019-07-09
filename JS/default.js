/*---------- Verifications formulaire d'inscription ----------*/

// on récupère les différents inputs du formulaire d'inscription
var nom = document.getElementById('nom');
var prenom = document.getElementById('prenom');
var pseudo = document.getElementById('pseudo');
var mail = document.getElementById('mail');
var mdp = document.getElementById('mdp');
var confirm = document.getElementById('confirm');
var oeil = document.getElementById('oeil');

// on met un eventListener sur chaque input
// l'évènement "input" est declenché à chaque fois que l'utiilisateur enfonce une touche (ce qui déclenche la focntion "verif")
nom.addEventListener("input", verif);
prenom.addEventListener("input", verif);
pseudo.addEventListener("input", verif);
mail.addEventListener("input", verif);
mdp.addEventListener("input", verif);
confirm.addEventListener("input", verifConfirmMdp);
oeil.addEventListener("mousedown", function (){ afficheMdp(true);}); // quand le clic est enclenché, on affiche le mot de passe
oeil.addEventListener("mouseup", function (){ afficheMdp(false);}); // quand le clic est relevé, on cache à nouveau le mot de passe

// l'objet "erreurs" contient chaque champ
// 1 = erreur
// 0 = OK
// tous les champs sont en erreur car aucun champ n'est renseigné au chargement de la page
var erreurs = {
    "nom" : 1,
    "prenom" : 1,
    "pseudo" : 1,
    "mail" : 1,
    "mdp" : 1,
    "confirm" : 1
};

function verif(e)
{ // méthode qui vérifie la validité d'un champ du formulaire
    // on stock la cible de l'évènement dans la variable 'monInput'
    var monInput = e.target;
    // on met [0] car il n'y a qu'un élément de la classe 'boutonVert' dans la div, c'est donc le 1er.
    var boutonVert = (monInput.parentNode).getElementsByClassName("boutonVert")[0];
    // même chose pour le bouton rouge et le message d'erreur
    var boutonRouge = (monInput.parentNode).getElementsByClassName("boutonRouge")[0];
    var messageErreur = (monInput.parentNode).getElementsByClassName("messageErreur")[0];  
    
    if(monInput.value == '')
    { // si le champ est vide, on affiche seulement le message d'erreur
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'hidden';
        messageErreur.innerHTML = 'Champ manquant';
    }
    else if(monInput.id == 'mdp' && !monInput.checkValidity())
    {// si l'id de l'input est 'mdp' et que le mot de passe est invalide
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'visible';
        messageErreur.innerHTML = "8 caractères minimum, dont 1 majuscule, une minuscule, 1 chiffre et un caractère spécial";
    }
    else if(monInput.id == 'pseudo' && !monInput.checkValidity())
    {
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'visible';
        messageErreur.innerHTML = "6 caractères minimum";
    }
    else if(monInput.id == 'mail' && !monInput.checkValidity())
    {
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'visible';
        messageErreur.innerHTML = "Email invalide";
    }
    else if(!monInput.checkValidity()) //si checkValidity retourne 'false'
    // la méthode 'CheckValidity' retourne 'true' si l'input contient une donnée valide (elle vérifie le pattern(regex) et le type de l'input en question).
    {
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'visible';
        messageErreur.innerHTML = 'Format incorrect';
    }
    else // si chekValidity() retourne 'true' (la donnée est valide)
    {
        boutonVert.style.visibility = 'visible';
        boutonRouge.style.visibility = 'hidden';
        messageErreur.innerHTML = '';
        // on passe la propriété 'nom' de l'objet 'erreurs' à 0, donc champ valide
        erreurs[monInput.name] = 0;
    }

    if(monInput.id == "mdp") // si l'input actuellement testé est le mot de passe, on affiche l'icone 'oeil'
    {
        oeil.style.visibility = "visible";
    }

    verifForm(); 
}

function verifForm()
{ // méthode qui vérifie la validité de tout le formulaire
    // le bouton submit n'est pas grisé (on peut cliquer dessus)
    document.getElementById('submitInscription').disabled = false;
    for(var key in erreurs)
    {
        // si une des propriétés de l'objet 'erreur' a pour valeur '1' (donc il y a au moins une erreur dans le formulaire)
        if(erreurs[key] == 1)
        {
            // on grise le bouton submit (on ne peut pas cliquer dessus)
            document.getElementById('submitInscription').disabled = true;
        }
    }
}

function afficheMdp(flag){ 
    // méthode qui permet d'afficher le mot de passe en cliquant sur l'icone "oeil" 
    inputMdp = mdp;
    if(flag)
    {
        inputMdp.type = "text"; // input type = "text"
    }
    else
    {
        inputMdp.type = "password"; // input type = "password"
    } 
}

function verifConfirmMdp(e)
{// méthode qui vérifie que la confirmation du mot de passe correspond bien au mot de passe entré dans l'input 'mdp'
    var monInput = e.target;
    var motDePasse = mdp.value;
    var confirmation = confirm.value;
    var boutonVert = (monInput.parentNode).getElementsByClassName("boutonVert")[0];
    var boutonRouge = (monInput.parentNode).getElementsByClassName("boutonRouge")[0];
    var messageErreur = (monInput.parentNode).getElementsByClassName("messageErreur")[0];

    if(monInput.value === '') // si le champ est vide, on affiche seulement le message d'erreur
    {
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'hidden';
        messageErreur.innerHTML = 'champ manquant';
    }
    else if(confirmation === motDePasse) // si le mot de passe et la confirmation correspondent
    {
        boutonVert.style.visibility = 'visible';
        boutonRouge.style.visibility = 'hidden';
        messageErreur.innerHTML = '';
    }
    else // sinon, le mot de passe et la confirmation ne correspondent pas
    {
        boutonVert.style.visibility = 'hidden';
        boutonRouge.style.visibility = 'visible';
        messageErreur.innerHTML = '';
        erreurs[monInput.name] = 0;
    }
    verifForm();
}

/*--------------------------------------------------*/
/* Cookies */

