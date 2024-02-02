<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li
                class="page-item"
                :class="{ active: page.active }"
                v-for="(page, key) in links"
            >
                <Link
                    class="page-link"
                    :href="page.url"
                    v-html="page.label"
                    v-if="page.url !== null"
                ></Link>
            </li>
        </ul>
    </nav>
</template>
<script>
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        Link,
    },
    props: {
        links: Array,
    },
};
</script>
