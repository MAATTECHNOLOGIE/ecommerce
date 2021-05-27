$(function(){



	/* --------------

      Menu client

	-----------------*/

        // Page des produits
         $(".produits").click(function(){
              $("#main_content").load("/produits");
         });

        // Page fitness
         $('.Fitness').click(function(){
            $("#main_content").load("/fitness");
         });

        // Page Contact
         $('.contact').click(function(){
            $("#main_content").load("/contact");
         });

        // Panier
         $('.panier').click(function(){
            $("#main_content").load("/panier");
         });

        // Compte client
         $('.compte').click(function(){
           $("#main_content").load("/compte");
         });

        // Compte client
         $('.about').click(function(){
           $("#main_content").load("/about");
         });

        // Compte cgu
         $('.cgu').click(function(){
           $("#main_content").load("/cgu");
         });

        /*----------------------------

           Gestion de catégorie_home

        ------------------------------*/



        // Filtrage de catégorie

          $(".catg").click(function(){

            var catgID = $(this).attr('id');

            var titre = $(this).attr('titre');

            console.log(catgID);

            $("#main_content").load('test',{catg:catgID});

         });

        



       

});