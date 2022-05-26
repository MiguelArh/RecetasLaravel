<template>

    <div>

        <button type="submit" class="btn btn-danger" value="Eliminar ×" v-on:click="eliminarReceta">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono-recetas" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg> Eliminar
        </button>
    </div>


</template>

<script>
export default {
    props: ['recetaId'],

    methods: {
        eliminarReceta(){
            // console.log('Diste click', this.recetaId);
            this.$swal({
                title: '¿Deseas elimimar la Receta?',
                text: "Una vez eliminada, no se podrá recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {

                    const params ={
                        id: this.recetaId
                    }
                    //Enviar Peticion al Servidor

                    axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                        .then(respuesta => {
                            this.$swal({
                            title: 'Receta Eliminada!',
                            icon: 'success'
                            });

                            //Eliminar del DOM

                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            console.log(error);
                        })


                } else {
                    this.$swal({
                    title:'Cancelado',
                    text:'No se elimino el Registro',
                    icon:'error',
                    })
                }
                })
        }
    }
}
</script>
