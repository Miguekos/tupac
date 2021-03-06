<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <div class="container">
        <from>
            <h2>Comprar productos</h2>
            <!-- Trigger the modal with a button -->
            <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar</button> -->
            <div class="form-group">
                <label>Producto</label>
                <select class="selectpicker form-control" id="pro_id" onchange="agregarProducto()" name="pro_id" data-width='100%'>
                            <option value="Lentes">Lentes</option>
                            <option value="Casco">Casco</option>
                            <option value="Gorra">Gorra</option>
                    </select>
            </div>
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
                        <td><span id="total">0</span> <input class="form-control" type="hidden" id="total_final" name="total_final"  value="0" readonly /></td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
            <div class="form-group">
                <button type="submit" id="guardar" name="guardar" class="btn btn-lg btn-default pull-right">Guardar</button>
            </div>
        </from>





        </div>

    </div>

    <script>
    function RefrescaProducto() {
            var ip = [];
            var i = 0;
            $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
            $('.iProduct').each(function(index, element) {
                i++;
                ip.push({
                    id_pro: $(this).val()
                });
            });
            // Si la lista de Productos no es vacia Habilito el Boton Guardar
            if (i > 0) {
                $('#guardar').removeAttr('disabled', 'disabled');
            }
            var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
            $('#ListaPro').val(encodeURIComponent(ipt));
        }

        function agregarProducto() {

            var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
            var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select


            var sptext = text.split();

            var newtr = '<tr class="item"  data-id="'+sel+'">';
            newtr = newtr + '<td class="iProduct" >' + sel + '</td>';
            newtr = newtr + '<td><input class="form-control" type="text" id="cantidad[]" name="lista[]" onChange="Calcular(this);" /></td><td><input class="form-control" type="text" id="precunit[]" name="lista[]" onChange="Calcular(this);" value="2.30"/></td><td><input class="form-control" type="text" id="totalitem[]" name="lista[]" readonly /></td>';
            newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item" ><i class="fa fa-times"></i></button></td></tr>';

            $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

            RefrescaProducto(); //Refresco Productos

            $('.remove-item').off().click(function(e) {
                var total = document.getElementById("total");
                total.innerHTML = parseFloat(total.innerHTML) - parseFloat(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                    $('#ProSelected .no-item').slideDown(300);
                RefrescaProducto();
                
                Calcular(e.target);
            });
            $('.iProduct').off().change(function(e) {
                RefrescaProducto();
            
            });
        }

        
        function Calcular(ele) {
            var cantidad = 0, precunit = 0, totalitem = 0 ;
            var tr = ele.parentNode.parentNode;
            var nodes = tr.childNodes;
        
            for (var x = 0; x<nodes.length;x++) {
                
                if (nodes[x].firstChild.id == 'cantidad[]') {
                    cantidad = parseFloat(nodes[x].firstChild.value,10);
                }
                if (nodes[x].firstChild.id == 'precunit[]') {
                    precunit = parseFloat(nodes[x].firstChild.value,10);
                }
                if (nodes[x].firstChild.id == 'totalitem[]') {
                    anterior = nodes[x].firstChild.value;
                    totalitem = parseFloat((precunit*cantidad),10);
                    nodes[x].firstChild.value = totalitem;
                }
            }
            // Resultado final de cada fila ERROR, al editar o eliminar una fila
            var total = document.getElementById("total");
            if (total.innerHTML == 'NaN') {
                total.innerHTML = 0;
                // 
            }
            total.innerHTML = parseFloat(total.innerHTML)+totalitem -anterior ;    
        }
    
    </script>