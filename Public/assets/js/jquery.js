function addToPanierAjax() {
  // Cette fonction gère l'ajout d'un téléphone au panier via un bouton spécifique
  $(".btnAddTelephone").click(function () {
    // Récupère l'ID du bouton cliqué
    var inputId = $(this).attr("id");
    console.log(inputId);
    // Construit l'URL pour l'ajout au panier en fonction de l'ID
    var url_panier = "Panier/addToPanier/" + inputId;
    console.log(url_panier);
    // Effectue une requête AJAX pour ajouter au panier
    $.ajax({
      url: url_panier,
      data: "qte=1", // Ajoute une quantité fixe de 1
      dataType: "text",
      success: (data) => {
        // Met à jour le nombre de produits dans le panier affiché
        $("#nombre").html(data);
        console.log("nb produits dans mon cart = " + data);
      },
      error: (jqXHR, status, error) => {
        console.log("ERREUR AJAX", status, error);
      },
    });
  });
}

function addTelephoneToPanierAjax(productId) {
  // Cette fonction gère l'ajout d'un téléphone au panier via un formulaire spécifique
  $("#form" + productId).on("click", (evtSubmit) => {
    evtSubmit.preventDefault();
    // Construit l'URL pour l'ajout au panier en fonction de l'ID du produit
    var url_cart = "Panier/addToPanier/" + productId;
    // Effectue une requête AJAX avec la quantité spécifiée par l'utilisateur
    $.ajax({
      url: url_cart,
      data: "qte=" + $("#field" + productId).val(), // Récupère la quantité depuis un champ spécifique
      dataType: "text",
      success: (data) => {
        // Met à jour le nombre de produits dans le panier affiché
        $("#nombre").html(data);
        console.log("nb produits dans mon deuxième cart = " + data);
      },
      error: (jqXHR, status, error) => {
        console.log("ERREUR AJAX", status, error);
      },
    });
  });
}

function cofirmDelete() {
  // Cette fonction attache un gestionnaire d'événement aux liens de suppression pour demander confirmation avant de supprimer
  $(document).ready(function() {
    $(".lien").on("click", function(event) {
      event.preventDefault();
      // Affiche une boîte de dialogue de confirmation avant de supprimer
      var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ?");
      if (confirmation) {
        // Redirige vers l'URL du lien si la suppression est confirmée
        window.location.href = $(this).attr("href");
      } else {
        console.log("suppresion annulé.");
      }
    });
  });
}

function deleteMesage() {
  // Cette fonction gère la suppression d'un message ou d'un formulaire en cachant l'élément parent
  $(document).ready(function() {
    $(".cross").on("click", function() {
      var change = $(this).closest(".alert"); // Recherche l'élément parent de classe .alert
      var changeform = $(this).closest(".error-formulaire"); // Recherche l'élément parent de classe .error-formulaire
      if (change.length) {
        change.toggleClass("disparition"); // Bascule la classe .disparition pour cacher ou afficher l'élément .alert
      } else if (changeform.length) {
        changeform.toggleClass("disparition"); // Bascule la classe .disparition pour cacher ou afficher l'élément .error-formulaire
      }
    });
  });
}

function menu(){
  // Cette fonction gère le comportement d'un menu mobile ou d'un menu à bascule
  $(document).ready(function() {
    $("#menu").on("click", function() {
      console.log("ok");
      var change = $(".nav__buttons"); 
      var menuburger = $(".menuburger"); 
      change.toggleClass("change"); 
      // menuburger.toggleClass("menuburgerchange"); // Bascule la classe .menuburgerchange pour modifier l'apparence du bouton de menu
    });
  });
}
