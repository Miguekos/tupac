<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <div class="container">
        <from>
            <h2>Comprar productos</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar</button>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar producto a la lista</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Producto</label>
                            <select class="selectpicker form-control" id="pro_id" name="pro_id" data-width='100%'>
                                        <option value="Lentes">Lentes</option>
                                        <option value="Casco">Casco</option>
                                        <option value="Gorra">Gorra</option>
                                </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                        <button type="button" onclick="agregarProducto()" class="btn btn-default" data-dismiss="modal">Agregar</button>
                    </div>
                </div>

            </div>
        </div>

    </div>