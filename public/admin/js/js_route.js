$(function()
{



/*--------- -----------------
TABLEAU DE BORD 
-----------------------------*/

    /*************************  
    ** Gestion de produit **
    **************************/
     
     $('#newProd').click(function(){
         $('#main_content').load("/newProd");
     });

     $("#pubProd").click(function(){
         $('#main_content').load("/pubProd");
     });

     $("#lockProd").click(function(){
         $('#main_content').load("/lockProd");
     });

    /************************* 
    ** Gestion de clients **
    **************************/
     
     $('#nwClient').click(function(){
         $('#main_content').load("/nwClient");
     });

     $("#listClient").click(function(){
         $('#main_content').load("/listClient");
     });

    /************************* 
    ** Gestion de commandes **
    **************************/
     
     $('#newComd').click(function(){
         $('#main_content').load("/newComd");
     });

     $("#noComd").click(function(){
         $('#main_content').load("/noComd");
     });

     $("#okComd").click(function(){
         $('#main_content').load("/okComd");
     });

     $("#livComd").click(function(){
         $('#main_content').load("/livComd");
     });

    /************************* 
    ** Gestion de zone  **
    **************************/
     
     $('#newZone').click(function(){
         $('#main_content').load("/newZone");
     });

     $("#listeZone").click(function(){
         $('#main_content').load("/listeZone");
     });

    /************************* 
    ** Gestion de catégorie  **
    **************************/
     
     $('#newCatg').click(function(){
         $('#main_content').load("/newCatg");
     });

     $("#listeCatg").click(function(){
         $('#main_content').load("/listeCatg");
     });



    /************************* 
    ** Gestion de slides  **
    **************************/
     
     $('#newSlide').click(function(){
         $('#main_content').load("/newSlide");
     });

     $("#pubSlide").click(function(){
         $('#main_content').load("/pubSlide");
     });

    /************************* 
    ** Gestion Paramétrage  **
    **************************/
    $("#config").click(function(){
      $("#main_content").load("/setting");  
    });



    /************************* 
    ** Ajout d'option au Prd**
    **************************/

    $("#optPrd").click(function(){
      $("#main_content").load("/optPrd");  
    });

    



});