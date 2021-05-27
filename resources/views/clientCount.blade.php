@include('layouts.partials_client.header')


    <!-- ===============================================-->
    <!--   DEBUT DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->

    <div id="main_content">
         @include('pages.client.count')
    </div>




    <!-- ===============================================-->
    <!--   FIN DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->




@include('layouts.partials_client.footer')
@if(isset($achatEnCour) && $achatEnCour == 1)
<script type="text/javascript">
	$(function()
	{
         var token = $('input[name=_token]').val();
         var pays ={{  $_SESSION["cmd"]["pays"] }};
         var liv = {{ $_SESSION["cmd"]["liv"] }};
         var vile = {{ $_SESSION["cmd"]["vile"] }};
		$("#main_content").load("checkout",
        {pays:pays,_token:token,vile:vile,liv:liv});
	})
</script>
@endif


{{-- CODE JS DE newComd.blade --}}
<script type="text/javascript">
  
$(function()
{
  $(".more").click(function(){
     var numCmd = $(this).attr("numcomd");
     $.ajax({
       url:'detailComd',
       method:'get',
       data:{numCmd:numCmd},
       dataType:'text',
       success:function(data){
         $(".prodD").html(data)
         $("#modalLarge").modal('show');
       },
       error:function(data){
       }
     });
     
  });

})

</script>