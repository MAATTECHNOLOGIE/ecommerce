          <!-- Orders list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Code comd.</th>
                  <th>Date Commande</th>
                  <th>Total( {{getTDevise()}} )</th>
                  <th>Statut</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               @foreach($comd as $cmd)
                 @if($cmd->Statut==0)
                    <tr>
                     <td class="py-3"><a class="nav-link-style font-weight-medium font-size-sm" href="#order-details" data-toggle="modal">
                     	{{$cmd->numComd}}
                      </a>
                     </td>
                     <td class="py-3">{{$cmd->dateComd}}
                     </td>
                     
                     <td class="py-3">{{$cmd->montant}}
                     	 {{getTDevise()}}
                     </td>
                     <td class="py-3">
                     	<span class="badge badge-info m-0">
                     		Nouvelle
                     	</span>
                     </td>
                     <td>
                     	<button type="button" 
                       numcomd="{{$cmd->numComd}}"
                       class="btn btn-outline-success 
                       btn-pill more">
                     		Détails
                     	</button>
                     </td>
                    </tr>
                 @endif
               
               @endforeach
              </tbody>
            </table>
          </div>
          <hr class="pb-4">

          <!-- Large modal-->
          <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h4 class="modal-title">Détails</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
               
                <div class="modal-body">
                  <section class="col-lg-12 pt-lg-4 pb-4 mb-3">
                   <div class="pt-2 px-4 pl-lg-0 pr-xl-5 prodD">

                    
                  
                   </div>
                  </section>
                </div>
                         
                <div class="modal-footer">
                  <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">
                    OK
                  </button>
                </div>
              
              </div>
            </div>
          </div>  
<script type="text/javascript">
  
  $(".more").click(function(){
     var numCmd = $(this).attr("numcomd");
     $.ajax({
       url:'detailComd',
       method:'get',
       data:{numCmd:numCmd},
       dataType:'text',
       success:function(data){
         console.log(data);
         $(".prodD").html(data)
         $("#modalLarge").modal('show');
       },
       error:function(data){
         console.log("error");
       }
     });
     
  });

</script>