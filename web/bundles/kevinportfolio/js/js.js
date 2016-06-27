/**
 * Created by Dev1 on 24/06/2016.
 */
$(document).ready(function() {

    /*
    *
    * GESTION DU FORMULAIRE DE PROFIL
    *
     */

    /*
    Gestion des ajouts et suppressions de skills, experiences et studies
     */
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $containerStudies     = $('div#profil_studies');
    var $containerExperiences = $('div#profil_experiences');
    var $containerSkills      = $('div#profil_profilSkills');

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var indexStudies     = $containerStudies.find('li').length;
    var indexExperiences = $containerExperiences.find('li').length;
    var indexSkills      = $containerSkills.find('li').length;

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('#add-study').click(function(e) {
        addStudy($containerStudies);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });
    $('#add-experience').click(function(e) {
        addExperience($containerExperiences);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });
    $('#add-skill').click(function(e) {
        addSkill($containerSkills);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // S'il n'y a aucune entrée dans la collection on ajoute un champs vide, sinon
    if (indexStudies == 0) {
        addStudy($containerStudies);
    }
    if (indexExperiences == 0) {
        addExperience($containerExperiences);
    }
    if (indexSkills == 0) {
        addSkill($containerSkills);
    }

    function addStudy($containerStudies) {
        // On récupère le prototype
        var template = $containerStudies.attr('data-prototype')
            .replace(/__name__/g,        indexStudies);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On affiche le numéro de l'entrée
        $prototype.find('h4').append(indexStudies + 1);

        // On ajoute le prototype modifié dans la balise <ul>
        $containerStudies.find('ul').append($prototype);

        // On ajoute l'event sur les liens delete
        var $deleteLink = $prototype.find('.remove-study');
        $deleteLink.click( function (e) {
            $prototype.remove();

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
        indexStudies++;
    }

    function addExperience($containerExperiences) {
        // On récupère le prototype
        var template = $containerExperiences.attr('data-prototype')
            .replace(/__name__/g,        indexExperiences);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On affiche le numéro de l'entrée
        $prototype.find('h4').append(indexExperiences + 1);

        // On ajoute le prototype modifié dans la balise <ul>
        $containerExperiences.find('ul').append($prototype);

        // On ajoute l'event sur les liens delete
        var $deleteLink = $prototype.find('.remove-experience');
        $deleteLink.click( function (e) {
            $prototype.remove();

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
        indexExperiences++;
    }

    function addSkill($containerSkills) {
        // On récupère le prototype
        var template = $containerSkills.attr('data-prototype')
            .replace(/__name__/g,        indexSkills);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On affiche le numéro de l'entrée
        $prototype.find('h4').append(indexSkills + 1);

        // On ajoute le prototype modifié dans la balise <ul>
        $containerSkills.find('ul').append($prototype);

        // On ajoute l'event sur les liens delete
        var $deleteLink = $prototype.find('.remove-experience');
        $deleteLink.click( function (e) {
            $prototype.remove();

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
        indexSkills++;
    }

    // Ajouter la suppression des blocs aux boutons supprimer
    $('.remove-study').click(function (e) {
        $(this).parent('li').remove();
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    });

    $('.remove-experience').click(function (e) {
        $(this).parent('li').remove();
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    });

    $('.remove-skill').click(function (e) {
        $(this).parent('li').remove();
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    });

    /*
     Fonction de récupération de la ville en fonction du CP
      */
    $('#profil_postalCode').autocomplete({
        delay:     500,
        minLength: 5,
        source:    function (request, response)
        {
            // requete HTTP vers l'API
            var client = new XMLHttpRequest();
            client.open("GET", "http://api.zippopotam.us/fr/" + request.term, true);
            client.onreadystatechange = function() {
                if(client.readyState == 4) {
                    if (client.responseText !== ""){
                        // Récupératin de la réponse sous forme d'objet
                        var item = JSON.parse(client.responseText);
                        $('#profil_city').val(item['places'][0]['place name']);
                        $('#profil_city').addClass('validCity');
                        setTimeout(function(){
                            $('#profil_city').removeClass('validCity');
                        }, 1000);
                        response(item['postal code']);
                    }
                };
            };
            client.send();
        }
    });

});