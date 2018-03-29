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

<div class="text-center">
    <h2><p><b>Caja Registradora</b></p></h2>
    <!-- <form>  -->
        ID: <input class="form-group" autofocus type="text" id="id" onkeyup="showHint(this.value)">
        Cantidad: <input class="form-group" type="text" id="monto">
        <input type="submit" value="Agregar" onclick="agregarProducto(),clean(),operar('multiplicar')" class="btn btn-lg btn-default"></input>
    <!-- </form> -->
</div>
<p> <span id="txtHint"></span></p>

    <div class="container">
        <from>
            <h2>Productos Agregados</h2>

            <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
            <table id="TablaPro" class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
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
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><span id="total_1">0</span> <span class="form-control" type="" id="total_final" name="total_final" value="0" readonly> </span></td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
            <div class="form-group">
                <button type="submit" id="guardar" onclick="operar('multiplicar');" name="guardar" class="btn btn-lg btn-default pull-right">Calcular</button>
                <button type="submit" id="guardar" onclick="operar('multiplicar');" name="guardar" class="btn btn-lg btn-default pull-right">Imprimir</button>
            </div>
        </from>



        </div>

    </div>

<script src="caja.js"></script>