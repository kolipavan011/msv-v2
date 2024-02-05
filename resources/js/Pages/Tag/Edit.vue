<template>
    <div class="inertia-page">
        <Head title="Posts" />

        <form @submit.prevent="submit">
            <!-- page header -->
            <header class="mb-4">
                <div
                    class="d-flex justify-content-between mb-4 align-items-end"
                >
                    <h3 class="m-0">TAG EDIT</h3>

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
                    <div class="col-12">
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
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="input-title" class="form-label"
                                >Label</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="input-label"
                                aria-describedby="input-label"
                                placeholder="post label ..."
                                v-model="form.label"
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
                                    @click="postSlugify(form.label)"
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

export default {
    props: {
        tag: Object,
    },
    layout: Layout,
    components: {
        Head,
        Link,
        VueEditor,
    },

    data() {
        return {
            form: useForm({
                label: this.tag.label,
                title: this.tag.title,
                slug: this.tag.slug,
                description: this.tag.description,
                body: this.tag.body,
                seo: {
                    title: this.tag.seo.title,
                    description: this.tag.seo.description,
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
            this.form.put(route("tags.update", { id: this.tag.id }));
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
