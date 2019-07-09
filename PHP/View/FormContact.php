<div id="Contact">Contact</div>
        <div class ="form">
    
                <div class="intitule"><label for="nom">Nom:</label></div>
                <div class="encadre"><input type="text" name="nom" id="nom" autofocus required pattern="[A-Za-zâäàéèùêëîïôöçñ-]{2,}"></div>
                <!-- <div class="bouton"><input type="button" title="Entrez votre nom " value="X"> -->
                
        </div>
    
    
         <div class ="form">
    
                <div class="intitule"><label for="prenom">Prenom:</label></div>
                <div class="encadre"><input type="text" name="prenom" id="prenom" required pattern="[A-Za-zâäàéèùêëîïôöçñ-]{2,}" ></div>
                <!-- <div class="bouton"><input type="button" title="Entrez votre nom " value="X"> -->
                
        </div>
        <div class ="form">
    
                <div class="intitule"><label for="adresseMail">Adresse mail:</label></div>
                <div class="encadre"><input type="text" name="adresseMail" id="adresseMail" required pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"></div>
                <!-- <div class="bouton"><input type="button" title="Entrez votre nom " value="X"> -->
                
        </div>
        <div class ="form">
    
                <div class="intitule"><label for="sujet">Sujet:</label></div>
                <div class="encadre"><input type="text" name="sujet" id="sujet" required></div>
                <!-- <div class="bouton"><input type="button" title="Entrez votre nom " value="X"> -->
                
        </div>
        <div class ="form">
    
                <div class="intitule"><label for="votreMessage">Votre message:</label></div>
                <div class="encadre"><TEXTAREA name="votreMessage" rows=12 cols=40 required></TEXTAREA></div> 
                <!-- <div class="bouton"><input type="button" title="Entrez votre nom " value="X"> -->
               
                
                </div>
        <div id="bouton">
                <input type="button" title="envoyer" value="Envoyer">
                <input type="button" title="annuler" value="Annuler">
        </div>
