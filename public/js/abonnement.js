function init()
{
    //-------------Configuration
    CinetPay.setConfig({
        apikey: '6820562105ffc56b7257464.26123769',
        site_id: 814773,
        notify_url: 'http://79f6c020852f.ngrok.io/cinetpay_notify'
    });

    //-------------Gestion des evenements
    //error
    CinetPay.on('error', function (e) {
        console.error(e);
        //Swal.fire('Une erreur est survenue');
    });
    //ajax
    CinetPay.on('ajaxStart', function () {
        document.getElementById('bt_get_signature').setAttribute('disabled', 'disabled');
    });
    CinetPay.on('ajaxStop', function () {
        document.getElementById('bt_get_signature').removeAttribute('disabled');
    });
    //Lorsque la signature est généré
    CinetPay.on('signatureCreated', function (token) {
        console.log('Tocken généré: ' + token);
    });
    CinetPay.on('paymentPending', function (e) {
        console.log("paiement en cours");
    });
    CinetPay.on('paymentSuccessfull', function (paymentInfo) {
        if (typeof paymentInfo.lastTime != 'undefined') {
            if (paymentInfo.cpm_result == '00') {
                Swal.fire({
                  'title': 'Paiement validée !',
                  'icon': 'success',
                  'text': 'Votre commande a été payée avec succès.'
                });

                window.location="/compteLg"
                
            } else {
                     $(".buybefore").show();
                    Swal.fire({
                      'title': 'Paiement échouer !',
                      'icon': 'error',
                      'text': 'Echec du processus de paiement.'
                    });            
                    }
        }
    });



        //Lancement de la souscription
        $('.buybefore').click(function()
        {
          var offre_id = $(this).attr('forfait');
         const ipAPI = '/saveTrans';

         Swal.queue([{
          title: 'Système de paiement',
          confirmButtonText: 'Payez maitenant',
          confirmButtonColor: '#FFC750',
          text:'Le système de paiement est en cours de chargement',
          showLoaderOnConfirm: true,
          preConfirm: () => {
            return fetch(ipAPI)
              .then(response => response.json())
              .then(data => testMe(data))
              .catch(() => {
                Swal.insertQueueStep({
                  icon: 'error',
                  title: 'Erreur lors du paiement !!!'
                })
              })
          }
         }])

        });

        // Méthode
              function testMe(data)
              {
                    var designation = 'Achat sur PruneK';
                    CinetPay.setSignatureData({
                     amount: parseInt(data.amount),
                     trans_id: data.codepaiement,
                     currency: 'XOF',
                     designation: designation,
                     custom: ''
                    });
                    CinetPay.getSignature();
              }

}