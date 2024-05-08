<template>
    <AuthenticationLayout title="Register">

        <ValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div class="grid gap-4">


                <div class="flex ">
                    <label class="block text-sm font-medium w-1/4  mt-4">Tipo de Cliente:</label>
                    <select v-model="selectedType"
                        class="mt-1 block text-black border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="externo">Cliente Externo</option>
                        <option value="interno">Cliente Interno</option>
                    </select>
                </div>


                <div v-if="selectedType === 'interno'">
                    <div class="flex text-gray-800">
                        <label for="cargo" class="block w-1/4 text-sm font-medium text-white">Cargo:</label>
                        <select v-model="form.cargo" id="cargo" name="cargo"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Seleccionar Cargo</option>
                            <option value="cobranza">Cobranza</option>
                            <option value="contador">Contador</option>
                            <option value="ejecutivo_comercial">Ejecutivo Comercial</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
                    </div>
                </div>
                
                <div class="space-y-2">
                    <Label for="name" value="Nombre" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <UserIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input  id="name" type="text" class="block w-full" placeholder="Nombre" v-model="form.name" required autofocus autocomplete="name" />
                    </InputIconWrapper>
                </div>


                
                <div class="space-y-2">
                    <Label for="email" value="Email" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <MailIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input with-icon id="email" type="email" class="block w-full" placeholder="Email" v-model="form.email" required />
                    </InputIconWrapper>
                </div>

                <!-- NUEVOS -->
                <div class="space-y-2">
                    <Label for="rut" value="RUT" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <PhoneIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input with-icon id="rut" type="text" class="block w-full" placeholder="Rut" v-model="form.rut" required />
                    </InputIconWrapper>
                </div>
            
                <div class="space-y-2">
                    <Label for="telefono" value="Telefono" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <PhoneIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input with-icon id="phone" type="text" class="block w-full" placeholder="Telefono" v-model="form.telefono" required />
                    </InputIconWrapper>
                </div>

                <div class="space-y-2">
                    <Label for="address" value="Dirección" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <PhoneIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input with-icon id="address" type="text" class="block w-full" placeholder="Dirección" v-model="form.address" required />
                    </InputIconWrapper>
                </div>

                <div class="space-y-2">
                    <Label for="ciudad" value="Ciudad" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <PhoneIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input with-icon id="ciudad" type="text" class="block w-full" placeholder="Ciudad" v-model="form.ciudad" required />
                    </InputIconWrapper>
                </div>

                <div class="space-y-2">
                    <Label for="region" value="Región" />
                    <InputIconWrapper>
                        <!-- <template #icon>
                            <PhoneIcon aria-hidden="true" class="w-6 h-6" />
                        </template> -->
                        <Input with-icon id="region" type="text" class="block w-full" placeholder="Región" v-model="form.region" required />
                    </InputIconWrapper>
                </div>
       <!-- FINNUEVOS -->

                <div class="space-y-2">
                    <Label for="password" value="Password" />
                    <InputIconWrapper>
                        <template #icon>
                            <LockClosedIcon aria-hidden="true" class="w-6 h-6" />
                        </template>
                        <Input with-icon id="password" type="password" class="block w-full" placeholder="Password" v-model="form.password" required autocomplete="new-password" />
                    </InputIconWrapper>
                </div>

                <div class="space-y-2">
                    <Label for="password_confirmation" value="Confirm Password" />
                    <InputIconWrapper>
                        <template #icon>
                            <LockClosedIcon aria-hidden="true" class="w-6 h-6" />
                        </template>
                        <Input with-icon id="password_confirmation" type="password" class="block w-full" placeholder="Confirm Password" v-model="form.password_confirmation" required autocomplete="new-password" />
                    </InputIconWrapper>
                </div>

                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                    <Label for="terms">
                        <div class="flex items-center">
                            <Checkbox name="terms" id="terms" v-model:checked="form.terms" />

                            <div class="ml-2">
                                I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-blue-600 hover:text-blue-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-blue-600 hover:text-blue-900">Privacy Policy</a>
                            </div>
                        </div>
                    </Label>
                </div>

                <div>
                    <Button class="w-full justify-center gap-2" :disabled="form.processing" v-slot="{ iconSizeClasses }">
                        <UserAddIcon aria-hidden="true" :class="iconSizeClasses" />
                        <span>Registrarse</span>
                    </Button>
                </div>

                

                <p class="text-sm text-gray-600 dark:text-gray-400">
                    ¿Ya estás registrado?
                    <Link :href="route('login')" class="text-blue-500 hover:underline">
                        Login
                    </Link>
                </p>
            </div>
        </form>
    </AuthenticationLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3'
import AuthenticationLayout from '@/Layouts/AuthenticationLayout.vue'
import InputIconWrapper from '@/Components/InputIconWrapper.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import Checkbox from '@/Components/Checkbox.vue'
import Label from '@/Components/Label.vue'
import ValidationErrors from '@/Components/ValidationErrors.vue'
import { UserIcon, MailIcon, LockClosedIcon, UserAddIcon, PhoneIcon } from '@heroicons/vue/outline'


import { ref } from 'vue';

const selectedType = ref('externo');

const form = useForm({
    cargo: '',
    name: '',
    email: '',
    rut: '',
    telefono: '',
    address: '',
    ciudad: '',
    region: '',
    password: '',
    password_confirmation: '',
    terms: false,
})

console.log("AAAAAAAAAAAAAAa",useForm);

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>
