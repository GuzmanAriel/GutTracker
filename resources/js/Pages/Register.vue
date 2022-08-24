<template>
    <Head title="Register" />
    <main class="grid place-items-center min-h-screen max-w-md mx-auto">
        <section class="bg-white p-8 rounded-xl w-full border">
            <h1 class="text-3xl">
                Register
            </h1>

            <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
                    <input v-model="form.name" class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           required
                    >
                    <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                    <input v-model="form.email" class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="email"
                           id="email"
                           required
                    >
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                    <input v-model="form.password" class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="password"
                           id="password"
                           required
                    >
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <button class="bg-primary text-white rounded py-2 px-4 hover:bg-secondary"
                           type="submit" :disabled="form.processing"
                    > Submit</button>
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { useForm} from "@inertiajs/inertia-vue3";


let form = useForm({
        name: "",
        email: "",
        password: ""
    });

let submit = () => {
    form.post('/users');
};
</script>
