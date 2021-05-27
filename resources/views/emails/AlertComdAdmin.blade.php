@component('mail::message')
# Commande Client Dianys<br>

Une commande a été éffectuée sur votre site {{ getSite() }}<br>
Nom client : <strong>{{ $cltNom }}</strong> <br>
Numéro Tel  : <strong>{{ $cltTel }}</strong> <br>
Numéro Commande  : <strong>{{ $numCmd }}</strong> <br>
Montant  : <strong>{{ $montant.' '.getTDevise() }}</strong> <br>
Date  : <strong>{{ date("d-m-Y H:i:s") }}</strong> <br>

Merci,<br>
{{ config('app.name') }}
@endcomponent
