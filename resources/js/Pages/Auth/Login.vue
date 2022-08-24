<template>
    <Head title="Login" />

    <main class="grid place-items-center min-h-screen max-w-md mx-auto">
        <section class="bg-white p-8 rounded-xl w-full border">

            <h1 class="text-3xl mb-6">
                Login
            </h1>

            <form @submit.prevent="submit">

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           form="email">
                        Email
                    </label>

                    <input v-model="form.email" class="border p-2 w-full rounded"
                           type="email"
                           name="email"
                           id="email"
                           required
                    />
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           form="password">
                        Password
                    </label>

                    <input v-model="form.password" class="border p-2 w-full rounded"
                           type="password"
                           name="password"
                           id="password"
                           required
                    />
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="bg-primary
                    text-slate-50 rounded py-2 px-4
                    hover:bg-slate-50
                    hover:border
                    hover:border-primary
                    hover:text-primary"
                            :disabled="form.processing">
                        Login
                    </button>
                </div>

            </form>
            <Link href="/register" class="underline text-primary text-sm">Or Register Here</Link>
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
    email: '',
    password: ''
});

let submit = () => {
    form.post('/login');
}

</script>

