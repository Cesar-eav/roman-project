<template>
    <Head title="Roman Seguros" />
<div class="fondo">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm uppercase text-white ">
                    Acceso a clientes
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                <img src="imagenes/logo.png" class="w-96" ></img>
   
        </div>
    </div>
</div>
</template>

<style scoped>
.fondo {
  /* Establece el tamaño y posicionamiento del contenedor */
  width: 100%;
  height: 100vh; /* 100% de la altura de la ventana */
  display: flex;
  justify-content: center;
  align-items: center;

  /* Aplica el fondo con el gradiente lineal */
  background-image: linear-gradient(to bottom right, #f88724, #900100);
}
</style>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>
