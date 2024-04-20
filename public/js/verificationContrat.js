document.getElementById('addOrUpdateContrat').addEventListener('click', function (event) {
    //je recupere les inputs HTML
    const dateFinText = document.getElementById('DateFin');
    const dateDebutText = document.getElementById('DateDebut');

    //je recupere le message en lien avec les input
    const messageDateErreur = document.getElementById('messageDateErreur');
 
    // //je mets par défaut au display none, pour qu'il ne soit pas visible au premier abord, 
    // //ou réinitialiser à chaque fois qu'on clique de nouveau sur le bouton
    messageDateErreur.style.display = 'none';

    const dateDebut = new Date(dateDebutText.value);
    const dateFin = new Date(dateFinText.value);

    //on verifie que la date de fin n'est pas avant la date de début
    if (dateFin < dateDebut) {
        event.preventDefault();
        messageDateErreur.style.display = 'block';
    }
});