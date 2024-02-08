<template>
    <main class="py-4 vh-100">
        <Head title="Login" />

        <div class="container" style="margin-top: 100px">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-white">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            <form @submit.prevent="login">
                                <div class="row mb-3">
                                    <label
                                        for="email"
                                        class="col-md-4 col-form-label text-md-end"
                                        >Email</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            required
                                            autocomplete="email"
                                            autofocus
                                            v-model="form.email"
                                        />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label
                                        for="password"
                                        class="col-md-4 col-form-label text-md-end"
                                        >Password</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            required
                                            autocomplete="current-password"
                                            v-model="form.password"
                                        />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                                v-model="form.remember"
                                            />

                                            <label
                                                class="form-check-label"
                                                for="remember"
                                            >
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { Head, useForm } from "@inertiajs/vue3";

export default {
    name: "login",

    components: {
        Head,
    },

    data() {
        return {
            form: useForm({
                email: null,
                password: null,
                remember: false,
            }),
        };
    },
    methods: {
        login() {
            this.form.post(route("login"));
        },
    },
};
</script>
