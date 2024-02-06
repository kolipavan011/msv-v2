<template>
    <div class="inertia-page">
        <Head title="Dashboard" />

        <!-- page header -->
        <header class="mb-4">
            <div class="d-flex justify-content-between mb-4 align-items-end">
                <h3 class="mt-2">Vidbot</h3>
            </div>
        </header>

        <!-- page content(search bar) -->
        <div class="container px-0">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Keyword ..."
                            v-model="query"
                        />
                        <button
                            class="btn btn-primary btn-sm"
                            type="button"
                            @click="nextPage()"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- page content(result) -->
        <div class="container px-0 mb-4">
            <div
                class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4"
            >
                <div class="col" v-for="video in videos">
                    <div class="card h-100">
                        <img
                            :width="video.snippet.thumbnails.medium.width"
                            :height="video.snippet.thumbnails.medium.height"
                            :src="video.snippet.thumbnails.medium.url"
                            class="card-img-top"
                        />
                        <div class="card-tip">
                            {{ formatDuration(video.contentDetails.duration) }}
                        </div>
                        <div class="card-body">
                            <p class="card-title">
                                {{ video.snippet.title }}
                            </p>
                        </div>
                        <button type="button" class="btn btn-warning rounded-0">
                            Download
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- loader -->
        <div
            class="container px-0 d-flex justify-content-center align-items-center"
            style="height: 300px"
            v-if="loading"
        >
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item" v-if="nextToken">
                    <a
                        class="page-link"
                        href="#"
                        @click.prevent="prevPage()"
                        aria-label="Previous"
                    >
                        <span aria-hidden="true">&laquo;</span> Previous
                    </a>
                </li>
                <li class="page-item" v-if="nextToken">
                    <a
                        class="page-link"
                        href="#"
                        @click.prevent="nextPage()"
                        aria-label="Next"
                    >
                        Next <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import { Head, router } from "@inertiajs/vue3";
import Layout from "../../Layouts/AuthenticatedLayout.vue";
import { YoutubeDataAPI } from "youtube-v3-api/dist";

const Youtube = new YoutubeDataAPI("AIzaSyBTX1j2o0wV9YC9c9VORGEC6LuQOyxiEgc");

export default {
    layout: Layout,

    props: {
        keyword: String,
        pageToken: String,
    },

    components: {
        Head,
    },

    data() {
        return {
            loading: false,
            query: this.keyword.replaceAll("-", " "),
            nextToken: null,
            videos: [],
        };
    },

    methods: {
        fetchData() {
            if (this.query.length == 0) return;

            this.loading = true;
            let params = { type: "video" };

            if (this.pageToken) {
                params.pageToken = this.pageToken;
            }

            Youtube.searchAll(this.query, 50, params)
                .then(({ items, nextPageToken }) => {
                    this.nextToken = nextPageToken;
                    return Youtube.searchVideo(
                        items.map((i) => i.id.videoId).toString()
                    );
                })
                .then(({ items }) => {
                    this.loading = false;
                    this.videos = items;
                });
        },

        nextPage() {
            if (this.query.length == 0) return;
            let params = {
                q: this.query.replaceAll(" ", "-"),
            };

            if (this.nextToken) {
                params.pageToken = this.nextToken;
            }
            router.get(route("vidbot"), params);
        },

        prevPage() {
            window.history.back();
        },

        uploadVideo() {
            // code
        },

        formatDuration(duration) {
            return duration
                .replace("PT", "")
                .replace("S", "s")
                .replace("M", "m");
        },
    },

    mounted() {
        this.fetchData();
    },
};
</script>
<style>
.card-tip {
    position: absolute;
    background: #252525;
    padding: 5px 8px;
    border-radius: 20px;
    color: #fff;
    top: 10px;
    left: 10px;
    font-size: 75%;
}
</style>
