<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
         {{ usuario_externo.nombres }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">
            <p><strong>Nivel Ejecutivo:</strong> {{ usuario_externo.nivel_ejecutivo }}</p>
                <p><strong>Nombres:</strong> {{ usuario_externo.nombres }}</p>
                <p><strong>Apellido Paterno:</strong> {{ usuario_externo.apellido_paterno }}</p>
                <p><strong>Apellido Materno:</strong> {{ usuario_externo.apellido_materno }}</p>
                <p><strong>RUT:</strong> {{ usuario_externo.rut }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ usuario_externo.fecha_nacimiento }}</p>
                <p><strong>Fono:</strong> {{ usuario_externo.fono }}</p>
                <p><strong>Mail:</strong> {{ usuario_externo.mail }}</p>
                <p><strong>Dirección:</strong> {{ usuario_externo.direccion }}</p>
                <p><strong>Comuna:</strong> {{ usuario_externo.comuna }}</p>
                <p><strong>Región:</strong> {{ usuario_externo.region }}</p>
                <p><strong>Isapre:</strong> {{ usuario_externo.isapre }}</p>
                <p><strong>AFP:</strong> {{ usuario_externo.afp }}</p>
                </div>



            <div class="px-6 py-4 text-right bg-white dark:bg-dark-eval-3">
                <slot name="footer"> </slot>
            </div>
    </Modal>
</template>


<script>

import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue';



export default {
    components: {
        Modal,
        Button,
    },
    props: {
        usuario_externo: {
            type: Array,
            default: true,
        }, show: {
            type: Boolean,
            default: true,
        },
        maxWidth: {
            type: String,
            default: '2xl',
        },
        closeable: {
            type: Boolean,
            default: true,
        },
    },
    methods: {
        close() {
            this.$emit('close');
        }

    }
}



</script>
