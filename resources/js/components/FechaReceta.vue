<template>
    <div>
       <span v-text="formatearFecha"></span>
    </div>
</template>

<script>
export default {
    props: ['fecha'],
    mounted() {
        console.log('La fecha es: ', this.fecha);

    },

    computed: {
        formatearFecha(){
            return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY ');
        }
    }
}
</script>
