<?php
/**
 * Summary of namespace Controller
 */
namespace Controller;

// use Model\Entity\Telephone;
// use Form\ProductHandleRequest;
// use Model\Repository\ProductRepository;
use Service\Panier;

/**
 * Summary of ProductController
 */
class PanierController extends BaseController
{
    /**
     * Summary of add
     * @param mixed $id
     * @return void
     */
    public function addToPanier($id)
    {   
        $cm = new Panier();
        $nb = $cm->addArticlePanier($id);
        echo $nb;        
    }


    /**
     * Summary of show
     * @return void
     */
    public function read()
    {        

    
            $panier = $_SESSION["panier"];
        
            $this->render("panier/panier.php", [            
            "h1" => "Fiche cart",
            "panier" => $panier
            ]);
        
    }
    /**
     * Summary of edit
     * @param mixed $id
     * @return void
     */
    public function edit($id)
    {
        
    }

    public function delete($id)
    {
        
    }

}