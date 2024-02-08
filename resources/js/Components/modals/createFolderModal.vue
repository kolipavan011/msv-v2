<template>
    <div class="input-group">
        <input
            type="text"
            class="form-control border-0"
            placeholder="Give title ..."
            v-model="name"
            autofocus
        />
        <button class="btn btn-warning" type="button" @click="create">
            Create
        </button>
    </div>
</template>
<script>
export default {
    emits: ["oncreate"],
    data() {
        return {
            name: "",
        };
    },

    methods: {
        create() {
            this.$emit("oncreate", this.name);
        },
    },
};
</script>
