<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <!-- page header -->
        <header class="mb-4">
            <div class="d-flex justify-content-between mb-4 align-items-end">
                <h3 class="mt-2">PAGES</h3>

                <button type="button" class="btn btn-primary btn-sm">
                    Add Page
                </button>
            </div>
        </header>

        <!-- posts list -->
        <div class="container px-0 mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="d-none d-md-table-cell">#</th>
                        <th scope="col">Page</th>
                        <th scope="col" class="d-none d-md-table-cell">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in pages.data">
                        <td class="d-none d-md-table-cell">{{ post.id }}</td>
                        <td class="w-auto">
                            <p class="mb-2">{{ post.label }}</p>
                            <p class="mb-2 text-muted d-md-none">
                                created on {{ post.created_at }}
                            </p>
                            <div class="links-group">
                                <Link
                                    :href="route('pages.show', { id: post.id })"
                                >
                                    Edit
                                </Link>
                                <a
                                    :href="`/dashmin/pages/${post.id}`"
                                    @click.prevent="deletePost(post.id)"
                                    class="text-danger"
                                    >Delete</a
                                >
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell w-25">
                            {{ post.created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- pagination -->
        <Pagination :links="pages.links" />
    </div>
</template>

<script>
import { Head, Link, router } from "@inertiajs/vue3";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import Pagination from "../../Shared/Pagination.vue";

export default {
    layout: Layout,

    props: {
        pages: Object,
    },

    components: {
        Head,
        Link,
        Pagination,
    },

    methods: {
        deletePost(pageid) {
            this.$vbsModal
                .confirm({
                    title: "Delete page",
                    message: "Do you want to delete this page ?",
                })
                .then((confirm) => {
                    if (confirm)
                        router.delete(route("pages.destroy", { id: pageid }));
                });
        },
    },
};
</script>
