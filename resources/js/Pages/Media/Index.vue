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
                <div class="col" v-for="media in medias">
                    <a href="media" @click.prevent="openMedia(media)">
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
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, router } from "@inertiajs/vue3";
import _extend from "lodash/extend";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import createFolderModal from "../../Components/modals/createFolderModal.vue";
import viewVideoModal from "@/Components/modals/viewVideoModal.vue";

export default {
    layout: Layout,

    props: {
        items: Array,
    },

    components: {
        Head,
    },

    data() {
        return {
            medias: [],
        };
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

        openViewModal(media) {
            this.$vbsModal.open({
                content: viewVideoModal,
                contentProps: {
                    video: media,
                },
                contentEmits: {
                    ondelete: this.deleteMedia,
                },
                staticBackdrop: true, // will disable backdrop click to close modal if true
            });
        },

        openMedia(media) {
            if (media.isfolder) {
                router.get(route("media", { id: media.id }));
            } else {
                this.openViewModal(media);
            }
        },

        createFolder(title) {
            this.$vbsModal.close();
        },

        deleteMedia(media) {
            this.$vbsModal.close();
            router.delete(route("video.destroy", { id: media.id }), {
                onSuccess: () =>
                    this.medias.splice(this.medias.indexOf(media), 1),
            });
        },
    },

    created() {
        this.medias = this.items.map((i) => _extend(i, { isSelected: false }));
    },
};
</script>
