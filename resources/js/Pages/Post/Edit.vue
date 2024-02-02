<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <form @submit.prevent="submit">
            <!-- page header -->
            <header class="mb-4">
                <div
                    class="d-flex justify-content-between mb-4 align-items-end"
                >
                    <h3 class="mt-2">POSTS EDIT</h3>

                    <div>
                        <button
                            class="btn btn-success btn-sm me-2"
                            @click="featureImage"
                        >
                            Feature Image
                        </button>
                        <button class="btn btn-primary btn-sm" type="submit">
                            Publish
                        </button>
                    </div>
                </div>
            </header>

            <!-- posts list -->
            <div class="container px-0 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-title" class="form-label"
                                >Title</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="input-title"
                                aria-describedby="input-title"
                                placeholder="post title ..."
                                v-model="post.title"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-slug" class="form-label"
                                >Slug</label
                            >
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="post slug ..."
                                    aria-label="post slug"
                                    aria-describedby="post-slug"
                                    readonly
                                    v-model="post.slug"
                                />
                                <button
                                    class="btn btn-warning btn-sm"
                                    type="button"
                                    id="button-slug"
                                >
                                    sync
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-title" class="form-label"
                                >Seo Title</label
                            >
                            <textarea
                                class="form-control"
                                id="post-seo-title"
                                rows="4"
                                v-model="post.seo.title"
                                placeholder="seo title ..."
                            ></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-slug" class="form-label"
                                >Seo Description</label
                            >
                            <textarea
                                class="form-control"
                                id="post-seo-desc"
                                rows="4"
                                placeholder="seo description"
                                v-model="post.seo.description"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-title" class="form-label"
                                >Categories</label
                            >
                            <VueMultiselect
                                v-model="category"
                                :options="options"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-slug" class="form-label"
                                >Tags</label
                            >
                            <VueMultiselect v-model="tags" :options="options" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="input-desc" class="form-label"
                            >Description</label
                        >
                        <vue-editor
                            :editorToolbar="toolbarDescription"
                            v-model="post.description"
                            class="bg-white"
                            id="input-desc"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="input-body" class="form-label"
                            >Post body</label
                        >
                        <vue-editor
                            :editorToolbar="toolbarBody"
                            v-model="post.body"
                            class="bg-white"
                            id="input-body"
                        />
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import { VueEditor } from "vue3-editor";
import VueMultiselect from "vue-multiselect";

export default {
    props: {
        post: Object,
    },
    layout: Layout,
    components: {
        Head,
        Link,
        VueEditor,
        VueMultiselect,
    },

    data() {
        return {
            toolbarBody: [
                [{ header: [false, 2, 3, 4, 5, 6] }],
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
            ],
            toolbarDescription: [["bold", "italic", "underline"]],
            category: null,
            tags: null,
            options: ["list", "of", "options"],
        };
    },

    methods: {
        submit() {
            this.$inertia.put(
                route("posts.update", { id: this.post.id }),
                this.post
            );
        },

        featureImage() {
            this.$vbsModal
                .confirm({
                    title: "Unsaved Changes",
                    message: "Are you sure you want to leave this page?",
                })
                .then((data) => console.log(data));
        },
    },
};
</script>
