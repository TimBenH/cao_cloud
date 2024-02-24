var cadretiretZoneDepot = document.getElementById('cadretiretZoneDepot');

cadretiretZoneDepot.addEventListener('dragover', function(e) {
    e.preventDefault();
    cadretiretZoneDepot.style.border = '2px dashed #00f'; // Bordure bleue lors du survol
    cadretiretZoneDepot.style.backgroundColor = '#f0f0f0'; // Fond gris clair lors du survol
});

cadretiretZoneDepot.addEventListener('dragleave', function() {
    cadretiretZoneDepot.style.border = 'none'; // Retour à la bordure normale
    cadretiretZoneDepot.style.backgroundColor = 'transparent'; // Retour à la couleur de fond transparente
});

cadretiretZoneDepot.addEventListener('drop', function(e) {
    e.preventDefault();
    cadretiretZoneDepot.style.border = 'none'; // Retour à la bordure normale
    cadretiretZoneDepot.style.backgroundColor = 'transparent'; // Retour à la couleur de fond transparente

    var files = e.dataTransfer.files;

    // Afficher les noms des fichiers dans la console pour déboguer
    for (var i = 0; i < files.length; i++) {
        console.log('Nom du fichier: ' + files[i].name);
    }
});
