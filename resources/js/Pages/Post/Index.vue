<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <!-- page header -->
        <header class="mb-4">
            <div class="d-flex justify-content-between mb-4 align-items-end">
                <h3 class="mt-2">POSTS</h3>

                <div class="d-flex gap-2">
                    <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        @click="openCreateModal"
                    >
                        New
                    </button>
                    <select
                        id="post-selector"
                        name="post-status"
                        class="border-0 form-select"
                        v-model="type"
                        @change="filterPosts"
                    >
                        <option value="published">Published</option>
                        <option value="drafted">Drafted</option>
                        <option value="trashed">Trashed</option>
                    </select>
                </div>
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
                                    v-if="post.deleted_at == null"
                                >
                                    Edit
                                </Link>
                                <a
                                    href="#"
                                    @click.prevent="deletePost(post.id)"
                                    class="text-danger"
                                    >Delete</a
                                >
                                <Link
                                    :href="route('posts.select', [post.id, 1])"
                                    class="text-success"
                                    v-if="post.deleted_at == null"
                                    >Videos</Link
                                >
                                <Link
                                    :href="route('posts.restore', post.id)"
                                    v-if="post.deleted_at != null"
                                    class="text-warning"
                                >
                                    Restore
                                </Link>
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
import createFolderModal from "@/Components/modals/createFolderModal.vue";

export default {
    layout: Layout,

    props: {
        posts: Object,
        filter: String,
    },

    components: {
        Head,
        Link,
        Pagination,
    },

    data() {
        return {
            type: this.filter,
        };
    },

    methods: {
        filterPosts() {
            router.get(route("posts", { filter: this.type }));
        },

        openCreateModal() {
            this.$vbsModal.open({
                content: createFolderModal,
                contentProps: {
                    name: "",
                },
                contentEmits: {
                    oncreate: this.createPost,
                },
            });
        },

        createPost(title) {
            this.$vbsModal.close();
            if (title.length == 0) return;
            router.post(route("posts.create"), {
                title: title,
            });
        },

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
