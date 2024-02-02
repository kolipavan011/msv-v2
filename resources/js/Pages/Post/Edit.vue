<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <form action="/">
            <!-- page header -->
            <header class="mb-4">
                <div
                    class="d-flex justify-content-between mb-4 align-items-end"
                >
                    <h3 class="mt-2">POSTS EDIT</h3>

                    <button type="submit" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </header>

            <!-- posts list -->
            <div class="container px-0 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <Textinput label="Title" type="text" />
                    </div>
                    <div class="col-md-6">
                        <Textinput label="Slug" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <Textinput label="Feature Image" type="text" />
                    </div>
                    <div class="col-md-6">
                        <Textinput label="Slug" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <Textinput label="Title" type="text" />
                    </div>
                    <div class="col-md-6">
                        <Textinput label="Slug" type="text" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import Textinput from "../../Shared/Textinput.vue";

export default {
    props: {
        post: Object,
    },
    layout: Layout,
    components: {
        Head,
        Link,
        Textinput,
    },
};
</script>
