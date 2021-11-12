
const usu_rol = $('#id_rol_x').val();
const usu_id = $('#id_usu_x').val();
const totalUsuariosUI = $('#totalUsuarios');
const totalPiscicultoresUI = $('#totalPiscicultores');
const totalAcuicultoresUI = $('#totalAcuicultores');
const totalFormatosUI = $('#totalFormatos');
const chatsAbiertosUI = $('#chatsAbiertos');
const chatsCerradosUI = $('#chatsCerrados');
const totalMortandadUI = $('#totalMortandad');

$(document).ready(() =>
{
   // Grafica de barras y cantidad de formatos
   if (usu_rol == 1) {
      var ruta = 'total_formatos_grafico';
   }else if (usu_rol == 2) {
      var ruta = 'total_formatos_piscicultor';
   }else {
      var ruta = 'total_formatos_acuicultor';
   }

   $.post(`controller/home.php?op=${ruta}`, {usu_id:usu_id}, (data) =>
   {
      // Grafica
      data = JSON.parse(data);

      if (usu_rol == 1) {
         var datosGrafica = [
            { "nom": "Biocrecimiento", "total": data[0].biocrecimiento },
            { "nom": "Tbl alimentacion", "total": data[0].tbl_alimentacion },
            { "nom": "Parametros FQ", "total": data[0].parametros_FQ },
            { "nom": "Temperatura agua", "total": data[0].temp_gua },
            { "nom": "Temperatura ambiente", "total": data[0].temp_ambiente },
            { "nom": "Est acuicultura", "total": data[0].est_Acuicultura }
         ]
      }else if (usu_rol == 2) {
         var datosGrafica = [
            { "nom": "Biocrecimiento", "total": data[0].biocrecimiento },
            { "nom": "Tbl alimentacion", "total": data[0].tbl_alimentacion }
         ]
      }else {
         var datosGrafica = [
            { "nom": "Parametros FQ", "total": data[0].parametros_FQ },
            { "nom": "Temperatura agua", "total": data[0].temp_gua },
            { "nom": "Temperatura ambiente", "total": data[0].temp_ambiente },
            { "nom": "Est acuicultura", "total": data[0].est_Acuicultura }
         ]
      }

      new Morris.Bar({
         element: 'grafico',
         barColors: ['#08759F'],
         data: datosGrafica,
         xkey: 'nom',
         ykeys: ['total'],
         labels: ['Valor']
      });



      // Cantidad de formatos
      let cantidadTotal = 0;
      for (const i in data[0]) { cantidadTotal = cantidadTotal + parseInt(data[0][i]); }

      totalFormatosUI.html(cantidadTotal);
   });



   if (usu_rol == 1)
   {
      $.post('controller/home.php?op=total_usuarios', (data) =>
      {
         data = JSON.parse(data);
         totalUsuariosUI.html(data[0].total);
      });

      $.post('controller/home.php?op=total_piscicultores', (data) =>
      {
         data = JSON.parse(data);
         totalPiscicultoresUI.html(data[0].total);
      });

      $.post('controller/home.php?op=total_acuicultores', (data) =>
      {
         data = JSON.parse(data);
         totalAcuicultoresUI.html(data[0].total);
      });
   }


   $.post(`controller/home.php?op=${usu_rol == 1 ? 'total_chats_abiertos' : 'total_chats_abiertos_empleados'}`, {usu_id:usu_id}, (data) =>
   {
      data = JSON.parse(data);
      chatsAbiertosUI.html(data[0].total);
   });

   $.post(`controller/home.php?op=total_chats_cerrados`, {usu_id:usu_id}, (data) =>
   {
      data = JSON.parse(data);
      chatsCerradosUI.html(data[0].total);
   });

   $.post('controller/home.php?op=total_mortalidad', (data) =>
   {
      data = JSON.parse(data);
      totalMortandadUI.html(data[0].total);
   });
});
