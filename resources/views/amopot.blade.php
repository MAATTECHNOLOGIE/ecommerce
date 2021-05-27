@include('layouts.partials_client.header')


    <!-- ===============================================-->
    <!--   DEBUT DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->
    @csrf
    <div id="main_content">
         @include('pages.client.index')
    </div>



    <!-- ===============================================-->
    <!--   FIN DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->



@include('layouts.partials_client.footer')
