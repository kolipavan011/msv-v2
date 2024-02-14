<template>
    <div class="inertia-page">
        <Head title="Dashboard" />

        <div class="container px-0">
            <div class="row g-3">
                <div class="col-12 col-sm-6" v-for="item in cards">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted">
                                {{ $page.props[item] }}
                            </h5>
                            <p class="card-text text-uppercase fw-bold">
                                {{ item }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import Layout from "../Layouts/AuthenticatedLayout.vue";

export default {
    name: "Dashboard",

    layout: Layout,

    props: {
        posts: Number,
        categories: Number,
        tags: Number,
        pages: Number,
    },

    components: {
        Head,
    },

    data() {
        return {
            cards: ["posts", "categories", "tags", "pages"],
        };
    },

    mounted() {
        console.log(this.$page);
    },
};
</script>
