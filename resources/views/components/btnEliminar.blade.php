<button onclick="confirmDelete({{$link}}, {{$id}}, {{$mensaje}})"
    class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-md uppercase font-bold text-white">{{$nombre}}</button>
<script>
    function confirmDelete(link,id,mensaje) {
        ///mensaje mostrado
        alertify.confirm(mensaje,
            function() {
                ///crea un fomulario
                let form = document.createElement('form');
                form.method = 'POST';
                //ruta que se encargara de procesar la solicitud
                form.action = `/${link}/${id}`
                //escribe las directivas
                form.innerHTML = '@csrf @method('DELETE')';
                //guarda el formulario dentro del cuerpo del html
                document.body.appendChild(form);
                //ejecuta el submit
                form.submit();
                //si aceptamos muestra la alerta confirmado
                alertify.success('Confirmado');
            },
            function() {
                //si cancelamos muestra la alerta cancelado
                alertify.error('Cancelado');
            });
    }
</script>
