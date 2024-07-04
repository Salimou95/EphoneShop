function addToPanierAjax() {
  $(".btnAddTelephone").click(function () {
    
    var inputId = $(this).attr("id");
    console.log(inputId);
    var url_panier = "Panier/addToPanier/" + inputId;
    console.log(url_panier);
    $.ajax({
      url: url_panier,
      data: "qte=1",
      dataType: "text",
      success: (data) => {
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
  
  $("#form" + productId).on("click", (evtSubmit) => {
    evtSubmit.preventDefault();
    var url_cart = "Panier/addToPanier/" + productId;
    $.ajax({
      url: url_cart,
      data: "qte=" + $("#field" + productId).val(),
      dataType: "text",
      success: (data) => {
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
  $(document).ready(function() {
      $(".lien").on("click", function(event) {
          event.preventDefault();

          var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ?");

          if (confirmation) {
              window.location.href = $(this).attr("href");
          } else {
              console.log("suppresion annulé.");
          }
      });
  });
}

function deleteMesage() {
  $(document).ready(function() {
      $(".cross").on("click", function() {
          var change = $(this).closest(".alert");
          if (change.length) {
              change.toggleClass("disparition");
          }
      });
  });
}
function menu(){
  $("#menu").on("click", function() {
    console.log("ok");
    var change = $(".nav__buttons");
    var menuburger = $(".menuburger");
  
    change.toggleClass("change");
    menuburger.toggleClass("menuburgerchange");
  });
}
