function onSelect(e) 
{
    if (e.files.length < 3 || e.files.length > 4) {
        alert('Merci de sélectionner 3 ou 4 photos selon votre choix de mise en page');
        document.getElementById('formFileMultiple').value ="";
    }
}