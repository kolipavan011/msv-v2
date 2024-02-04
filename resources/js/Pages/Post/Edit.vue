<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <form @submit.prevent="submit">
            <!-- page header -->
            <header class="mb-4">
                <div
                    class="d-flex justify-content-between mb-4 align-items-end"
                >
                    <h3 class="m-0">POSTS EDIT</h3>

                    <button
                        class="btn btn-primary btn-sm"
                        type="submit"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? "Saving ..." : "Save" }}
                    </button>
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
                                v-model="form.title"
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
                                    v-model="form.slug"
                                    @blur="postSlugify(form.slug)"
                                />
                                <button
                                    class="btn btn-warning btn-sm"
                                    type="button"
                                    id="button-slug"
                                    @click="postSlugify(form.title)"
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
                                v-model="form.seo.title"
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
                                v-model="form.seo.description"
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
                                v-model="form.categories"
                                :options="categories"
                                :multiple="true"
                                :close-on-select="false"
                                label="label"
                                track-by="id"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-slug" class="form-label"
                                >Tags</label
                            >
                            <VueMultiselect
                                v-model="form.tags"
                                :options="tags"
                                :multiple="true"
                                :close-on-select="false"
                                label="label"
                                track-by="id"
                            />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-title" class="form-label"
                                >Published Date</label
                            >
                            <input
                                type="date"
                                class="form-control"
                                id="input-date"
                                aria-describedby="input-date"
                                v-model="form.published_at"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-slug" class="form-label"
                                >Feature Image</label
                            >
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="post slug ..."
                                    aria-label="post slug"
                                    aria-describedby="post-slug"
                                    readonly
                                    v-model="form.feature_image"
                                />
                                <button
                                    class="btn btn-warning btn-sm"
                                    type="button"
                                    id="button-slug"
                                >
                                    select
                                </button>
                            </div>
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
                            v-model="form.description"
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
                            v-model="form.body"
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
import { Head, Link, useForm } from "@inertiajs/vue3";
import Slugify from "../../Mixins/slugify";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import { VueEditor } from "vue3-editor";
import VueMultiselect from "vue-multiselect";

export default {
    props: {
        errors: Object,
        post: Object,
        categories: Array,
        tags: Array,
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
            form: useForm({
                title: this.post.title,
                slug: this.post.slug,
                description: this.post.description,
                feature_image: this.post.feature_image,
                body: this.post.description,
                categories: this.post.categories,
                tags: this.post.tags,
                published_at: this.post.published_at,
                seo: {
                    title: this.post.seo.title,
                    description: this.post.seo.description,
                },
            }),
            toolbarBody: [
                [{ header: [false, 2, 3, 4, 5, 6] }],
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
            ],
            toolbarDescription: [["bold", "italic", "underline"]],
        };
    },

    methods: {
        submit() {
            this.form.put(route("posts.update", { id: this.post.id }));
        },

        featureImage() {
            this.$vbsModal
                .confirm({
                    title: "Unsaved Changes",
                    message: "Are you sure you want to leave this page?",
                })
                .then((data) => console.log(data));
        },

        postSlugify(str) {
            this.form.slug = Slugify(str);
        },
    },
};
</script>

<style lang="scss">
.ql-container {
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        margin-bottom: 20px;
    }
}
</style>
