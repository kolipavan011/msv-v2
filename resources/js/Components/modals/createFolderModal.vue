<template>
    <div class="input-group">
        <input
            type="text"
            class="form-control border-0"
            placeholder="Give title ..."
            v-model="newName"
            autofocus
        />
        <button class="btn btn-warning" type="button" @click="create">
            Create
        </button>
    </div>
</template>
<script>
export default {
    props: {
        name: String,
    },
    emits: ["oncreate"],
    data() {
        return {
            newName: this.name,
        };
    },

    methods: {
        create() {
            this.$emit("oncreate", this.newName);
        },
    },
};
</script>
