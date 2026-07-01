<?php
//1.Initialiser Tableau

    $categories=[
        0=>[
            'code'=>'code1',
            'nom'=>'categorie1',
            'produits'=>[
                0=>[
                    'nom'=>'produit1',
                    'ref'=>'refProd1',
                    'prix'=>5000,
                    'qte'=>4
                ],
                1=>[
                    'nom'=>'produit2',
                    'ref'=>'refProd2',
                    'prix'=>10000,
                    'qte'=>2
                ]
            ]
        ],
        1=>[
            'code'=>'code2',
            'nom'=>'categorie2',
            'produits'=>[]
        ]
    ];
 //print_r($categories);

 //2.Afficher categories sans produits

    foreach ($categories as $categorie) {
        if(empty($categorie['produits'])){
            print_r($categorie);
        }
    }

//3. Enregistrer nouvelle categorie
$codeEstTrouver=false;
$categorie=[];
    do {
        $code=readline("Entrer le code: ");
        foreach ($categories as $categorie ) {
            if($categorie['code']==$code){
                echo "Le code doit etre unique \n";
                $codeEstTrouver=true;
                $code=readline("Entrer le code: ");

            }
        }
    } while ($code==""&&$codeEstTrouver);

    $nomEstTrouver=false;
    do {
        $nom=readline("Entrer le nom: ");
        foreach ($categories as $categorie ) {
            if($categorie['nom']==$nom){
                echo 'Le nom doit etre unique';
                $nomEstTrouver=true;
            }
        }
    } while ($nom==""&&$nomEstTrouver);
    $categorie= ['code'=>$code,
                   'nom'=>$nom,
                   'produits'=>[]
                 ];

    $categories[]=$categorie;

    // print_r($categories);

// 4. Rechercher une categorie et lui ajouter des produits

$code=readline("Entrer le code: ");
        
 foreach ($categories as $categorie =>$value) {
    $index=$categorie;
        if($value['code']==$code){

        $nomEstTrouver=false;
    do {
        $nom=readline("Entrer le nom: ");
        foreach ($categories as $categorie ) {
            if($categorie['nom']==$nom){
                echo 'Le nom doit etre unique';
                $nomEstTrouver=true;
            }
        }
    } while ($nom==""&&$nomEstTrouver);
    
    $refEstTrouver=false;
    do {
        $ref=readline("Entrer le ref: ");
        foreach ($categories as $categorie ) {
            var_dump($categorie['produits']     ['ref']);
            die;
            if($categorie['produits']['ref']==$ref){
                echo 'Le ref doit etre unique';
                $refEstTrouver=true;
            }
        }
    } while ($nom==""&&$refEstTrouver);
    do {
        $prix=readline("Entrer le prix: ");
            if($prix<0){
                echo 'Le prix doit etre positif';
            }
    } while ($prix>0);
     do {
        $qte=readline("Entrer le prix: ");
            if($qte<0){
                echo 'Le prix doit etre positif';
            }
    } while ($qte>0);
            $produit=[
                    'nom'=>$nom,
                    'ref'=>$ref,
                    'prix'=>$prix,
                    'qte'=>$qte
                ];
                $produits[]=$produit;
                $categories[$index]['produit']=$produits;
        }
    }

    //5 Ajouter categorie en lui ajoutant un produit, demande confiirmation , lors de lajout produit


          $codeIsValid = true;
    
   do { 
        
        $code = readline("saisir le code :");
        if (empty($code)) {
            echo "le code est obligatoire \n";
             $codeIsValid = false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["code"]) === $code) {
                $codeIsValid = false;
                echo "le code existe deja ...\n"; 
         }
       }  
}
        


    } while (!$codeIsValid);
    
     $nomIsValid = true;
  do { 
        
        $nom = readline("saisir le nom : ");
        if (empty($nom)) {
            echo "le nom est obligatoire";
             $nomIsValid= false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "le nom existe deja ..."; 
         }
       }  
}
    } while (!$nomIsValid);

     $produits = [];
     do {
         $produit =   [
                    "nom" => readline("saisir le nom : "),
                    "reference" => readline("saisir la reference : "),
                    "prix" => (int)readline("saisir le prix : "),
                    "quantite" => (int)readline("saisir la quantité : ")
                  ];
          $produits[]= $produit;

          $choix = strtolower(readline(" voulez vous continuer  oui/non "));
          
     } while ($choix === "oui");

    $categorie  =   [
            "code" => $code,
            "nom" => $nom,
            "produits" =>  $produits 
         ];

         $categories[] = $categorie;



?>