<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
                {{ empresas.razon_social }}
            </h2>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-900 mx-4 text-sm ">


            <div class="mt-4 col-span-2">
                <h2 class="text-lg font-semibold text-left leading-tight">
                    Datos Generales
                </h2>
            </div>



            <!-- Información Básica de la Empresa -->
            <div class="section col-span-2">
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
            <div class="mt-4 col-span-2">
                <h2 class="text-lg font-semibold text-left leading-tight">
                    Representante Legal
                </h2>
            </div>
            <div class="section col-span-2">
                <p><strong>Representante Legal:</strong> {{ empresas.representante_legal }}</p>
                <p><strong>RUT Representante:</strong> {{ empresas.rut_representante_legal }}</p>
                <p><strong>Email Representante:</strong> {{ empresas.mail_representante_legal }}</p>
                <p><strong>Fono Representante:</strong> {{ empresas.fono_representante_legal }}</p>
                <p><strong>Fecha Nacimiento Gerente:</strong> {{ empresas.fecha_nacimiento }}</p>
            </div>
            <!-- Separador -->
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
.section {
    background-color: #f5f5f5;
    /* Fondo rojo claro */
    padding: 16px;
    /* Espacio interno */
    margin-bottom: 16px;
    /* Espacio entre secciones */
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    border-radius: 8px;
    /* Bordes redondeados */
}
</style>
