<template>
    <div class="inertia-layout">
        <!-- Page Heading -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">Dashmin</a>

                <button
                    class="navbar-toggler"
                    type="button"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"
                                >Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
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
                                >
                                    {{ link }}
                                </Link>
                            </li>
                            <li class="nav-item">
                                <a
                                    :href="route('logout')"
                                    class="nav-link text-dark px-0"
                                    >Logout</a
                                >
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

export default {
    name: "AuthenticatedLayout",

    components: {
        Link,
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
