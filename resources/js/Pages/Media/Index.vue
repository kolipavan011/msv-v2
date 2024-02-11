<template>
    <div class="inertia-page">
        <Head title="Media" />

        <!-- page header -->
        <header class="mb-4">
            <div
                class="d-flex flex-column flex-sm-row justify-content-between gap-2"
            >
                <div>
                    <h3 class="m-0 d-inline">{{ name }}</h3>
                    <a
                        type="button"
                        class="ms-2"
                        @click.prevent="openRenameModal"
                        v-if="name !== 'Home'"
                    >
                        (edit)
                    </a>
                    <a
                        type="button"
                        class="ms-2 text-danger"
                        @click.prevent="deleteFolder"
                        v-if="name !== 'Home'"
                    >
                        (delete)
                    </a>
                </div>

                <div v-if="!canSelect">
                    <button
                        type="button"
                        class="btn btn-primary me-2 btn-sm"
                        @click="toggleSelect"
                    >
                        Select
                    </button>
                    <button
                        type="button"
                        class="btn btn-warning btn-sm"
                        @click="openCreateModal"
                    >
                        New Folder
                    </button>
                </div>
                <div v-else>
                    <button
                        type="button"
                        class="btn btn-primary me-2 btn-sm"
                        @click="moveMedia"
                    >
                        Move({{ list.length }})
                    </button>
                    <button
                        type="button"
                        class="btn btn-secondary btn-sm"
                        @click="resetSelection"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </header>

        <!-- page content -->
        <div class="container px-0">
            <div
                class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4"
            >
                <div class="col" v-show="folder != 1">
                    <a href="#" @click.prevent="goback">
                        <div class="card h-100 bg-transparent border-0">
                            <img
                                width="320"
                                height="180"
                                src="/img/prev-folder.jpg"
                                class="card-img-top bg-secondary rounded"
                            />
                            <div class="card-body">
                                <p class="card-title text-truncate text-center">
                                    Go Back
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" v-for="media in items">
                    <a href="media" @click.prevent="openMedia(media)">
                        <div class="card h-100 bg-transparent border-0">
                            <img
                                width="320"
                                height="180"
                                :src="media.thumbnail"
                                class="card-img-top bg-secondary border-primary border-4 rounded"
                                :class="{ border: list.includes(media.id) }"
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
import { Head, router, Link } from "@inertiajs/vue3";
import { mapState, mapActions } from "pinia";
import { useSelectionStore } from "@/Store/selectionStore";
import _extend from "lodash/extend";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import createFolderModal from "../../Components/modals/createFolderModal.vue";
import viewVideoModal from "@/Components/modals/viewVideoModal.vue";

export default {
    layout: Layout,

    props: {
        items: Array,
        folder: Number,
        name: String,
    },

    components: {
        Head,
        Link,
    },
    computed: {
        ...mapState(useSelectionStore, ["list", "canSelect"]),
    },

    methods: {
        ...mapActions(useSelectionStore, [
            "toggle",
            "removeItem",
            "resetItem",
            "toggleSelect",
        ]),

        openCreateModal() {
            this.$vbsModal.open({
                content: createFolderModal,
                contentProps: {
                    name: "",
                },
                contentEmits: {
                    oncreate: this.createFolder,
                },
            });
        },

        openRenameModal() {
            this.$vbsModal.open({
                content: createFolderModal,
                contentProps: {
                    name: this.name,
                },
                contentEmits: {
                    oncreate: this.renameFolder,
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
                return router.get(route("media", { id: media.id }));
            }

            if (this.canSelect) {
                this.toggle(media.id);
                media.isSelected = this.list.includes(media.id);
                return;
            }
            this.openViewModal(media);
        },

        createFolder(title) {
            this.$vbsModal.close();
            if (title.length == 0) return;
            router.post(route("folder.create"), {
                title: title,
                folder_id: this.folder,
            });
        },

        renameFolder(title) {
            this.$vbsModal.close();
            if (title.length == 0) return;
            router.put(route("folder.update", { id: this.folder }), {
                title: title,
            });
        },

        deleteMedia(media) {
            this.$vbsModal.close();
            router.delete(route("video.destroy", { id: media.id }));
        },

        deleteFolder() {
            router.delete(route("folder.destroy", { id: this.folder }), {
                onBefore: () => confirm("Do you want to delete folde"),
            });
        },

        moveMedia() {
            if (this.list.length == 0) return;
            router.post(
                route("video.move", {
                    id: this.folder,
                    items: this.list,
                }),
                {},
                {
                    onSuccess: () => {
                        this.resetItem();
                        this.toggleSelect();
                    },
                }
            );
        },

        goback() {
            window.history.back();
        },

        resetSelection() {
            this.toggleSelect();
            this.resetItem();
        },
    },
};
</script>
