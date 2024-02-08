<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
                Video Preview
                <span class="badge rounded-pill badge-sm" :class="status"
                    >#</span
                >
            </h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="$vbsModal.close()"
            ></button>
        </div>
        <div class="modal-body">
            <img
                :width="video.snippet.thumbnails.high.width"
                :height="video.snippet.thumbnails.high.height"
                :src="video.snippet.thumbnails.high.url"
                class="w-100 rounded bg-secondary"
                v-if="!loading"
            />
            <div
                class="container px-0 d-flex justify-content-center align-items-center"
                style="height: 200px"
                v-else
            >
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-dismiss="modal"
                @click="$vbsModal.close()"
            >
                Close
            </button>
            <button
                type="button"
                class="btn btn-primary btn-sm"
                @click="downloadVideo"
                :disabled="loading"
            >
                Download
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        video: Object,
        keyword: String,
    },

    data() {
        return {
            loading: false,
            status: "bg-warning",
        };
    },

    methods: {
        downloadVideo() {
            this.loading = true;
            this.request()
                .post(route("video.create", { id: this.video.id }), {
                    title: this.video.snippet.title,
                    keyword: this.keyword,
                })
                .then((data) => {
                    console.log(data);
                    this.loading = false;
                    this.status = "bg-success";
                })
                .catch((error) => {
                    this.loading = false;
                    this.status = "bg-danger";
                    console.log(error);
                });
        },
    },
};
</script>
