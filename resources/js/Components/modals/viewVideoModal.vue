<template>
    <div class="modal-content">
        <div class="modal-body">
            <video
                width="400"
                height="300"
                :src="video.path"
                class="w-100 bg-secondary"
                controls
                :poster="video.thumbnail"
                preload="none"
            ></video>
            <textarea
                class="form-control mt-3 border-0 bg-secondary"
                name="video-name"
                id="video-name"
                rows="3"
                v-model="video.title"
            ></textarea>
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
                class="btn btn-danger btn-sm"
                data-bs-dismiss="modal"
                @click="$emit('ondelete', video)"
            >
                Delete
            </button>
            <button
                type="button"
                class="btn btn-primary btn-sm"
                @click="updateVideo"
            >
                Upadate
            </button>
        </div>
    </div>
</template>
<script>
import { router } from "@inertiajs/vue3";

export default {
    props: {
        video: Object,
    },

    emits: ["ondelete", "onupdate"],

    methods: {
        updateVideo() {
            router.put(route("video.update", { id: this.video.id }), {
                title: this.video.title,
            });
            this.$vbsModal.close();
        },
    },
};
</script>
