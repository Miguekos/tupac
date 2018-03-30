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
    var idP = document.getElementById("idP").innerHTML;
    var nombre = document.getElementById("nombre").innerHTML;
    var precio = document.getElementById("precio").innerHTML;
    var cantidad = document.getElementById("monto").value;
    
    // var precioV = document.getElementById("precio").value;
    // var cantidad = document.getElementById("precio").value;
    // console.log("asd" + precioV);

        // var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
    // var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select


    // var sptext = text.split();

    var newtr = '<tr class="item"  data-id="' + nombre + '">';
    newtr = newtr + '<td class="iProduct" >' + nombre + '</td>';
    // newtr = newtr + '<td><input class="form-control" type="text" id="cantidad[]" readonly name="lista[]" onload="Calcular(this);" value="'+ precio +'" /></td><td><input class="form-control" type="text" id="precunit[]" name="lista[]" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem[]" name="lista[]" readonly /></td>';
    newtr = newtr + '<td><input class="form-control" type="text" id="cantidad'+idP+'" readonly name="cantidad'+idP+'" onload="Calcular(this);" value="'+ cantidad +'" /></td><td><input class="form-control" type="text" id="precunit[]" name="precio'+idP+'" readonly onChange="Calcular(this);" value="'+ precio +'"/></td><td><input class="form-control" type="text" id="totalitem'+idP+'" name="totalitem'+idP+'" readonly /></td>';
    newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item" ><i class="fa fa-times">Eliminar</i></button></td></tr>';

    $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

    RefrescaProducto(); //Refresco Productos

    $('.remove-item').off().click(function(e) {
        var total = document.getElementById("total_1");
        total.innerHTML = parseFloat(total.innerHTML) - parseFloat(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
        $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
        if ($('#ProSelected tr.item').length == 0)
            $('#ProSelected .no-item').slideDown(300);
        RefrescaProducto();
        
        Calcular(e.target);
        // document.getElementById('total_final').innerHTML = "";
    });
    $('.iProduct').off().change(function(e) {
        RefrescaProducto();
    
    });
}
var i = 0;

function operar(x){
    
    var totalt =  eval(document.getElementById("total_1").value);
    // console.log(totalt + 10); 

    var idP = document.getElementById("idP").innerHTML;
    var valor_01 = document.getElementById("precio").innerHTML;
    var valor_02 = eval(document.getElementById('monto').value);
    // console.log(valor_01);
    // console.log(valor_02);
    switch(x){
        case('sumar'):
            var resultado = valor_01 + valor_02;
            break;
        case('restar'):
            var resultado = valor_01 - valor_02;
            break;
        case('multiplicar'):
            var resultado = valor_01 * valor_02;
            break;
        case('dividir'):
            var resultado = valor_01 / valor_02;
            break;
    }
    document.getElementById('totalitem'+idP).value = resultado.toFixed(2);
    var sum = eval(document.getElementById('totalitem'+idP).value);
    
    // console.log(sum + 2);
    // document.getElementById('total_1').value = sum;
    document.getElementById('total_1').value = sum + totalt;
    totalF = sum + totalt;

    document.getElementById('total_final').innerHTML = totalF.toFixed(2);
    // console.log(0 + totalt + resultado);
    // var qwe = document.getElementById('totalitem'+idP).innerText;
    // console.log("qwe " + resultado);
    
    // if (totalt === 0) {
    //     console.log("No hay nada");
    // }else{
    //     var totalt = document.getElementById("total_final").innerHTML;
    //     console.log("totalt "+totalt);
    
    
    // }
    
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
    var total = document.getElementById("total_1");
    if (total.innerHTML == 'NaN') {
        total.innerHTML = 0;
        // 
    }
    total.innerHTML = parseFloat(total.innerHTML)+totalitem-anterior ;    
}


function clean() {
    $('#id').val('');
    // $('#monto').val('');
    $('#id').focus();
  }


// el=document.getElementById('myul'); 
// els=el.getElementsByTagName('li');
// els=el.getElementById('totalitem[*]'); 
// vec=[] 
// for(i=0;i<els.length;i++){ 
//     if(els[i].parentNode==el) 
//         vec.push(els[i]); 
// } 
// alert(vec.length); 


var i = 0;
 
function contador(){
    i = i + 1;
    document.getElementById('items').value = i;

    console.log(i);
}


function enter1(){
    if (event.keyCode == 13)
    {
      $('#monto').focus();
      $('#monto').val('');
      // event.returnValue=false;
    }
}

function enter2(){
    if (event.keyCode == 13)
    {
      $('#btn').focus();
    }
}