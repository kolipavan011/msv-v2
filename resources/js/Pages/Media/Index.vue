<template>
    <div class="inertia-page">
        <Head title="Media" />

        <!-- page header -->
        <header class="mb-4">
            <div class="d-flex justify-content-between mb-4 align-items-end">
                <h3 class="mt-2">MEDIA</h3>

                <button
                    type="button"
                    class="btn btn-warning btn-sm"
                    @click="openCreateModal"
                >
                    New Folder
                </button>
            </div>
        </header>

        <!-- page content -->
        <div class="container px-0">
            <div
                class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4"
            >
                <div class="col" v-for="media in items">
                    <div class="card h-100 bg-transparent border-0">
                        <img
                            width="320"
                            height="180"
                            :src="media.thumbnail"
                            class="card-img-top bg-secondary"
                        />
                        <div class="card-body">
                            <p class="card-title text-truncate text-center">
                                {{ media.title }}
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
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import createFolderModal from "../../Components/modals/createFolderModal.vue";

export default {
    layout: Layout,

    props: {
        items: Array,
    },

    components: {
        Head,
    },

    methods: {
        openCreateModal() {
            this.$vbsModal.open({
                content: createFolderModal,
                contentEmits: {
                    oncreate: this.createFolder,
                },
            });
        },

        createFolder(title) {
            console.log(title);
            this.$vbsModal.close();
        },
    },
};
</script>
