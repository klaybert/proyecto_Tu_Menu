 // $(document).ready(function () 
 //  {
      $('#sidebarCollapse').on('click', function () 
      {
        $('#sidebar').toggleClass('active');
      });
      // alert("hola index_mesa");
      // $("#navbar").load("vista.nav_horizontal.php");
  // });

  function ir_index()
  {
    // var data_tabla_consul = $("div#data_tabla").text();
    window.location.href="index.php";
  }

//activamos el buscador de categorias, esta funcion es el sidebar lateral

$(document).ready(function()
   {
   var dato=1;
   $.post(
       "cat_gen.php", 
       {datos:dato},
       function(mensaje)
       {
         // alert(mensaje);
         var recibo = JSON.parse(mensaje);
         var array_reciclo = [];
         var array_cat = [];
         var array_cat_gen = [];
                        
          //borramos el sideBar para que no se recarga siempre
          $("ul#cat_gen").text("");

         for (var i = 0; i < recibo.length; i++) 
         {

            array_cat = [];
            if(!Array.isArray(recibo[i]))//si no es un array
            {
            	//Lo que no sea un array, debería quitarle espacios en blanco para evitar problemas con los IDs
                // alert("esto NO es un array"+recibo[i]);
                // recibo[i] = recibo[i].replace(/\s+/g, '');
                // alert("le quite los espacios blancos"+recibo[i]);
                array_reciclo.push(recibo[i]);
                array_cat_gen.push(array_reciclo);
            }
               else//aqui hacemos el for de los submenu
               {
                   // alert("esto SI es un array"+recibo[i]);

                   $("ul#cat_gen").append("<li class='active' id='data_printo"+array_reciclo[1]+"'>");
                   $("li#data_printo"+array_reciclo[1]).append("<a href='#"+array_reciclo[0]+"Submenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fas fa-home'></i>"+array_reciclo[1]+"</a>");
                   $("li#data_printo"+array_reciclo[1]).append("<ul class='collapse list-unstyled' id='"+array_reciclo[0]+"Submenu'>");                                
// $("div#data_printo").append("<a> "+array_reciclo[1]+"</a>");                                
                                // $("div#data_printo").append("</p>");
                                // $("div#data_printo").append("<ul>");
                   for(j=0;j<recibo[i].length;j=j+3)
                   {
                       // Aqui solo agarro el item 0, y 1 del array categorias
                       array_cat.push(recibo[i][j]);
                       array_cat.push(recibo[i][j+1]);
                       $("li#data_printo"+array_reciclo[1]+">ul").append("<li><a onclick='consulta_menu(this.id)' id='"+recibo[i][j]+"' href='#'>"+recibo[i][j+1]+"</a></li>");      
                   }
                   $("li#data_printo"+array_reciclo[1]+">ul").append("</ul>");
                                // $("div#data_printo").append("</div>");                           
                   array_reciclo = [];
               }
         $("ul#cat_gen").append("</li>");//fin 
         //////Aqui termina la impresion de los elemento
                            
        }//fin del for 1
                         
       });                
   });

//buscamos las subcategorias una vez que se carguen las categorias generales
        function buscar(idx)
        {
            alert(idx);
            var idx = idx;
            $.post(
            
                "consulta_cat.php",
                {dato:idx},
                function(mensaje)
                {
                    alert(mensaje);
                }

            );
        }

//funcion que permite pintar los items (o menus) de cada categorias
function consulta_menu(id_cat)
{
    $("div#productos").load("consulta_tus_menus.php?cat="+id_cat);
}

//funcion que nos lleva al php de pedidos
function add_pedidos(id_menu)
{
  $("#pedidos").show();
  $("#pedidos").load("pedidos_clientes.php?id_menu="+id_menu);
}

//hace el reaload del carrito cada vez que se elimina o agrega un item desde el carrito
function recarga_carrito(id_ped)
{
  // alert("hola, estamos en recarga carrito JS, y el id_ped es: "+id_ped);
  $("#pedidos").load("pedidos_clientes.php?ped="+id_ped);
  // $("#modalCart").load("pedidos_clientes.php?ped="+id_ped);
}

function recarga_modal_cart(id_ped)
{
  $(".modal-body").load("pedidos_clientes.php?ped="+id_ped);
  $("div#navbarSupportedContent > ul > li > button").dblclick();

}

function actualizar_pedido(id_ped)
{
  $(".modal-body").load("pedidos_clientes.php?ped="+id_ped);
}