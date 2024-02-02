<template>
    <div class="mb-3">
        <label for="input1" class="form-label" v-if="label">{{ label }}</label>
        <input :type="type" class="form-control" />
    </div>
</template>
<script>
export default {
    props: {
        label: String,
        type: String,
        error: String,
    },
};
</script>
