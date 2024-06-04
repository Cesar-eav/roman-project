<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
                {{ empresas.razon_social }}
            </h2>
        </div>
            <!-- Información Básica de la Empresa -->
            <div class="empresa p-4 rounded-md mx-4">              
                <p><strong>Razón Social:</strong> {{ empresas.razon_social }}</p>
                <p><strong>Nombre Fantasía:</strong> {{ empresas.nombre_fantasia }}</p>
                <p><strong>RUT Empresa:</strong> {{ empresas.rut_empresa_persona }}</p>
                <p><strong>Dirección:</strong> {{ empresas.direccion }}</p>
                <p><strong>Comuna:</strong> {{ empresas.comuna }}</p>
                <p><strong>Región:</strong> {{ empresas.region }}</p>
                <p><strong>Fono:</strong> {{ empresas.fono }}</p>
                <p><strong>Email:</strong> {{ empresas.mail }}</p>
                <p><strong>Nombre Banco:</strong>{{ empresas.nombre_banco }}</p>
                <p><strong>Número Cuenta:</strong> {{ empresas.numero_cuenta }}</p>
            </div>
            <!-- Información del Representante Legal -->
            <div class="representante p-4 mt-2 rounded-md  mx-4">
                <p><strong>Representante Legal:</strong> {{ empresas.representante_legal }}</p>
                <p><strong>RUT Representante:</strong> {{ empresas.rut_representante_legal }}</p>
                <p><strong>Email Representante:</strong> {{ empresas.mail_representante_legal }}</p>
                <p><strong>Fono Representante:</strong> {{ empresas.fono_representante_legal }}</p>
                <p><strong>Fecha Nacimiento Gerente:</strong> {{ empresas.fecha_nacimiento }}</p>
            </div>
            <!-- Separador -->
            <div class="col-span-1 md:col-span-3 border-t-2 border-gray-300 my-4"></div>

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
        empresas: {
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

<style>
.empresa {
    background-color: #ffcf80;
}
.representante{
    background-color: #ffcf80;
}
</style>
