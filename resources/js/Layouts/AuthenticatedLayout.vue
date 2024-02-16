<template>
    <div class="inertia-layout">
        <!-- Page Heading -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">Dashmin</a>
                <div>
                    <a :href="route('logout')">
                        <img
                            width="40px"
                            height="40px"
                            class="rounded-circle"
                            src="https://gravatar.com/avatar/96c61dea289cb9b68667116e0a62bd6a?s=200&d=robohash&r=x"
                            alt=""
                        />
                    </a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-3 d-none d-md-block">
                        <ul class="nav flex-column">
                            <li class="nav-item" v-for="link in pages">
                                <Link
                                    class="nav-link text-capitalize px-0"
                                    :class="
                                        $page.url.includes(link)
                                            ? 'text-primary fw-bold'
                                            : 'text-dark'
                                    "
                                    :href="route(link)"
                                    :preserve-state="false"
                                >
                                    {{ link }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-9 col-lg-9">
                        <slot />
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import Gravatar from "vue-gravatar";

export default {
    name: "AuthenticatedLayout",

    components: {
        Link,
        Gravatar,
    },

    data() {
        return {
            pages: [
                "dashboard",
                "posts",
                "categories",
                "tags",
                "pages",
                "media",
                "vidbot",
                "setting",
            ],
        };
    },
};
</script>
