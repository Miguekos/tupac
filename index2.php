<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getuser.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<div class="container text-center col-lg-12">
    
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <h2 class="jumbotron"><p><b>Caja Registradora</b></p></h2>
                <!-- <form>  -->
                <div class="col-lg-6">
                    ID: <input class="form-control" autofocus type="text" id="id" onkeyup="showHint(this.value)">
                </div>
                <div class="col-lg-6">
                    Cantidad: <input class="form-control" type="text" name="cantidad" id="monto">
                </div>
                
                <!-- <input type="submit" value="Agregar" onclick="agregarProducto(),clean(),operar('multiplicar')" class="btn btn-lg btn-default"></input> -->
                
                
                <div>
                    <!-- <a class="btn btn-info" type="button" onclick="agregarProducto(),clean(),operar('multiplicar')">email me</a> -->
                    <button onclick="agregarProducto(),clean(),operar('multiplicar'),contador()" style="border-top-width: 1px; margin-top: 10px;" class="btn btn-success">Agregar</button>
                </div>
                <!-- <div class="col-lg-4"> -->
                    
                <!-- </div> -->
                <!-- </form> -->
            </div>
            <form action="guardar.php" method="POST" id="guardar" accept-charset="utf-8">        
            
            <p> <span id="txtHint"></span></p>

                  
            <!-- <h2>Productos Agregados</h2> -->

            <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
            <table id="TablaPro" class="table">
                <thead>
                    <tr>
                        <th style="width:80%">Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="ProSelected">
                    <!--Ingreso un id al tbody-->
                    <tr>

                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td><div id="items" name="items">0</div></td>
                        <td>&nbsp;</td>
                        <td>
                            <input type="hidden" id="total_1" value="0" /> <span class="form-control" type="" id="total_final" name="total_final" value="0" readonly> </span>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
            <div class="form-group">
                <button type="submit" id="guardar" onclick="operar('multiplicar');" name="guardar" class="btn btn-lg btn-danger pull-right">Calcular</button> 
                <button type="submit" class="btn btn-lg btn-info pull-right">Imprimir</button>
            </div>
        </from>



        </div>
        </div>

    
<script src="caja.js"></script>
<div class="col-lg-3"></div>