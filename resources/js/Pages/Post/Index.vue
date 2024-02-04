<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <!-- page header -->
        <header class="mb-4">
            <div class="d-flex justify-content-between mb-4 align-items-end">
                <h3 class="mt-2">POSTS</h3>

                <select
                    id="post-selector"
                    name="post-status"
                    class="ml-auto w-auto border-0 v-100 form-select"
                >
                    <option value="published">Published</option>
                    <option value="draft">Drafted</option>
                </select>
            </div>
        </header>

        <!-- posts list -->
        <div class="container px-0 mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="d-none d-md-table-cell">#</th>
                        <th scope="col">Post</th>
                        <th scope="col" class="d-none d-md-table-cell">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts.data">
                        <td class="d-none d-md-table-cell">{{ post.id }}</td>
                        <td class="w-auto">
                            <p class="mb-2">{{ post.title }}</p>
                            <p class="mb-2 text-muted d-md-none">
                                created on {{ post.created_at }}
                            </p>
                            <div class="links-group">
                                <Link
                                    :href="route('posts.show', { id: post.id })"
                                >
                                    Edit
                                </Link>
                                <a
                                    href="#"
                                    @click.prevent="deletePost(post.id)"
                                    class="text-danger"
                                    >Delete</a
                                >
                                <a href="#" class="text-success">Videos</a>
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
        <Pagination :links="posts.links" />
    </div>
</template>

<script>
import { Head, Link, router } from "@inertiajs/vue3";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import Pagination from "../../Shared/Pagination.vue";

export default {
    layout: Layout,

    props: {
        posts: Object,
    },

    components: {
        Head,
        Link,
        Pagination,
    },

    methods: {
        deletePost(postid) {
            this.$vbsModal
                .confirm({
                    title: "Delete post",
                    message: "Do you want to delete this post ?",
                })
                .then((confirm) => {
                    if (confirm)
                        router.delete(route("posts.destroy", { id: postid }));
                });
        },
    },
};
</script>
