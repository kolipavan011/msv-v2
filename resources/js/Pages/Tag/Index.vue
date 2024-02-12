<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <!-- page header -->
        <header class="mb-4">
            <div class="d-flex justify-content-between mb-4 align-items-end">
                <h3 class="m-0">TAGS</h3>

                <div class="d-flex gap-2">
                    <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        @click="openCreateModal"
                    >
                        New
                    </button>
                    <select class="form-select">
                        <option value="untrashed">Active</option>
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
                        <th scope="col">Tag</th>
                        <th scope="col" class="d-none d-md-table-cell">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in tags.data">
                        <td class="d-none d-md-table-cell">{{ post.id }}</td>
                        <td class="w-auto">
                            <p class="mb-2">{{ post.label }}</p>
                            <p class="mb-2 text-muted d-md-none">
                                created on {{ post.created_at }}
                            </p>
                            <div class="links-group">
                                <Link
                                    :href="route('tags.show', { id: post.id })"
                                >
                                    Edit
                                </Link>
                                <a
                                    :href="`/dashmin/tags/${post.id}`"
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
        <Pagination :links="tags.links" />
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
        tags: Object,
    },

    components: {
        Head,
        Link,
        Pagination,
    },

    methods: {
        openCreateModal() {
            this.$vbsModal.open({
                content: createFolderModal,
                contentProps: {
                    name: "",
                },
                contentEmits: {
                    oncreate: this.createTag,
                },
            });
        },

        createTag(title) {
            this.$vbsModal.close();
            if (title.length == 0) return;
            router.post(route("tags.create"), {
                title: title,
            });
        },

        deletePost(tagid) {
            this.$vbsModal
                .confirm({
                    title: "Delete post",
                    message: "Do you want to delete this post ?",
                })
                .then((confirm) => {
                    if (confirm)
                        router.delete(route("tags.destroy", { id: tagid }));
                });
        },
    },
};
</script>
