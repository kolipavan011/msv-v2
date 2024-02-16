<template>
    <div class="inertia-page">
        <Head title="Select Media" />

        <!-- page header -->
        <header class="mb-4">
            <div
                class="d-flex flex-column flex-sm-row justify-content-between gap-2"
            >
                <div>
                    <h3 class="m-0 d-inline">{{ name }}</h3>
                </div>
                <div>
                    <button
                        type="button"
                        class="btn btn-primary me-2 btn-sm"
                        @click="moveMedia"
                    >
                        Sync ({{ list.length }})
                    </button>
                    <button
                        type="button"
                        class="btn btn-secondary btn-sm"
                        @click="resetSelection"
                    >
                        Reset
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
                    <a
                        :href="route('posts.select', [this.post, media.id])"
                        @click.prevent="openMedia(media)"
                    >
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

export default {
    layout: Layout,

    props: {
        items: Array,
        folder: Number,
        post: Number,
        name: String,
        selection: Array,
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

        openMedia(media) {
            if (media.isfolder) {
                return router.get(route("posts.select", [this.post, media.id]));
            }

            this.toggle(media.id);
            media.isSelected = this.list.includes(media.id);
            return;
        },

        moveMedia() {
            router.post(
                route("posts.sync", {
                    id: this.post,
                }),
                {
                    items: this.list,
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

    mounted() {
        this.selection.forEach((i) => this.toggle(i));
    },

    unmounted() {
        this.resetItem();
    },
};
</script>
