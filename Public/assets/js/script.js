document.querySelectorAll(".cross").forEach((crossElement) => {
    crossElement.addEventListener("click", () => {
        console.log("ok");
        var change = crossElement.closest(".alert");
        if (change) {
            change.classList.toggle("disparition");
        }
    });
});

document.querySelectorAll(".error-formulaire").forEach((crossElement) => {
    crossElement.addEventListener("click", () => {
        console.log("ok");
        var change = crossElement.closest(".error-formulaire");
        if (change) {
            change.classList.toggle("disparition");
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const searchIcon = document.getElementById('search-icon');

    // Fonction pour masquer l'icône
    const toggleIconVisibility = () => {
        if (searchInput.value.trim() === "") {
            searchIcon.style.visibility = 'visible';
        } else {
            searchIcon.style.visibility = 'hidden';
        }
    };

    // Ajouter un écouteur pour vérifier le texte tapé
    searchInput.addEventListener('input', toggleIconVisibility);

    // Assurez-vous que l'icône est affichée initialement
    toggleIconVisibility();
});
// window.addEventListener('load', () => {
//     console.log("okkdfc,skd,fvok");
//     const message = document.getElementsByClassName('.alert');

//     // Déclenchement de l'effet après un délai
//     setTimeout(() => {
//         message.classList.add('disparition'); // Ajoute la classe qui déclenche les transitions
//         // Suppression de l'élément du DOM après que les transitions sont complètes
//         setTimeout(() => message.remove(), 1000); // La durée doit correspondre à celle des transitions CSS
//     }, 3000); // Temps avant que le message commence à disparaître, ajustez selon le besoin
// });

// setTimeout(function() {
//     console.log("ok");
//     var divs = document.querySelectorAll(".alert");
//     divs.forEach(function(div) {
//         div.classList.add("disparition");
//     });
//   }, 3000);

// window.addEventListener('load', () => {
//     const message = document.getElementsByClassName('alert')[0]; 

//     setTimeout(() => {
//         message.classList.add('disparition'); 
//     }, 5000);
// });