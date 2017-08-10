<?php ?>

           
                            <!-- Script HORARIO QUE DEFINE BOM DIA, BOA TARDE E BOA NOITE-->
<script type="text/javascript">
   
    function myGood(){
                
                data = new Date();
                tempo = data.getHours();
                
        //alert(tempo);
                if( tempo > 5 && tempo < 12)
                {
                    x = document.getElementById('hr-time').innerHTML = "<i class='fa fa-star-o' aria-hidden='true'></i> Bom dia";
                }
                else if( tempo >= 12 && tempo < 18)
                {
                    x = document.getElementById('hr-time').innerHTML = "<i class='fa fa-star-half-o' aria-hidden='true'></i> Boa tarde";
                }
                else
                {
                    x = document.getElementById('hr-time').innerHTML = "<i class='fa fa-star' aria-hidden='true'></i> Boa noite";
                }
            }
</script>
<!-- Teste -->
<div id="ticketModal" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-teal w3-center w3-padding-32"> 
            <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
            <h2 id="hr-time"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
        </header>
        <div class="w3-container">       
            <br>
            <p><label>São exatamente</label></p>

            <p><label><i class="glyphicon glyphicon-time"></i> <h4 id="hora1"></h4><a style="text-decoration: none"> horas</a> </label></p>

            <br>
            <br>
            <button class="button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Ok <i class="fa fa-check"></i></button>
        </div>
    </div>
</div>

<?php ?>
