
document.getElementById('btnAddPersonneOrRegister').addEventListener('click', function (event) {
    //je recupere les inputs HTML
    const nom = document.getElementById('userLastname');
    const prenom = document.getElementById('userFirstname');
    const email = document.getElementById('userEmail');
    const password = document.getElementById('userPassword');

    //je recupere les messages en lien avec les input
    const messageLastname = document.getElementById('messageLastname');
    const messageFirstname = document.getElementById('messageFirstname');
    const messageEmail = document.getElementById('messageEmail');
    const messagePassword = document.getElementById('messagePassword');
 
    //je mets par défaut au display none, pour qu'il ne soit pas visible au premier abord, 
    //ou réinitialiser à chaque fois qu'on clique de nouveau sur le bouton
    messageFirstname.style.display = 'none';
    messageLastname.style.display = 'none';
    messageEmail.style.display = 'none';
    messagePassword.style.display = 'none';

    //on configure les regex pour verifier les champs
    const regexText = /^(?=.*[a-zA-Z]).{2,}$/;
    const regexEmail = /^[\w.%+-]+@[\w.-]+\.[a-zA-Z]{2,}$/;
    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;

    //quatre conditions qui verifie les inputs grace au regex, si la condition est fausse, l'erreur est affichée.
    if (!regexText.test(prenom.value)) {
        event.preventDefault();
        messageFirstname.style.display = 'block';
    }

    if (!regexText.test(nom.value)) {
        event.preventDefault();
        messageLastname.style.display = 'block';
    }

    if (!regexEmail.test(email.value)) {
        event.preventDefault();
        messageEmail.style.display = 'block';
    }

    if (!regexPassword.test(password.value)) {
        event.preventDefault();
        messagePassword.style.display = 'block';
    }
});