		// ************************
		// ** VALIDATION D'IMAGE **
		// ** 	   COTE CLIENT	  **
		// ************************



// 1 -  Creer la fonction de verification de la taille recommandé
		function verifTaille(myImg,largeur,hauteur)
		  {
		      file =myImg;
		      window.URL = window.URL || window.webkitURL;
		      img = new Image();
		      
		      img.onload = function(){
		          if(img.width > largeur || img.height > hauteur)
		          {
              		  myImg.value =""; //Vider le champs
		              errorMsg(img.width-largeur, img.height-hauteur);
		            
		          }
		          else
		          {
		              alert('Bonne taille'); // Pas necessaire

		              // ValidateSize(myImg)     //fonction de validation du poids
		           }
		      }
		      img.src = window.URL.createObjectURL(file);
		  }


// 2- Creer la fonction de validation du poids de l'image

		function ValidateSize(myImg,sizeMax) 
		  {
		          var FileSize = myImg.files[0].size / 1024 / 1024; // in MiB
		          if (FileSize > sizeMax) 
		          {
		              myImg.value =""; //Vider le input fichier
		              alert('Fichier trop volumineux');

		          }
		  }


// 3- Creer la fonction d'erreur de taille
		function errorMsg(width, height)
		  {
		      var str = "votre image est trop "
		      if(width>0){str+="large de "+width+"px";}
		      if(width>0 && height>0){str+=" et trop ";}
		      if(height>0){str+="haute de "+height+"px.";}
		      str+=". Veuillez respecter les tailles indiqués : 560 x 370";
		      alert(str);     
		  }


