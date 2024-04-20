function confirmerPersonne() {
    var res = false;
    var res2 = false;

    var res = confirm("Êtes-vous sûr de vouloir supprimer, cela engendrera aussi la suppression des contrats lui appartenant, de son contact et son dev, de son appartenance à une entreprise, à un groupe... ?");
    if (res == true) {
        var res2 = confirm("Êtes-vous sûr de vouloir supprimer, c'est définitif ?");
        if (res2 == true) {
            return true
        }
        else {
            return false
        }
    } else {
        return false
    }
}


function confirmerDev() {
    var res = false;
    var res2 = false;

    var res = confirm("Êtes-vous sûr de vouloir supprimer, cela engendrera aussi la suppression de l'appartenance à un groupe, la suppression de ses compétences ... ?");
    if (res == true) {
        var res2 = confirm("Êtes-vous sûr de vouloir supprimer, c'est définitif ?");
        if (res2 == true) {
            return true
        }
        else {
            return false
        }
    } else {
        return false
    }
}