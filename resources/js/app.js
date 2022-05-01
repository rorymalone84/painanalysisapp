require("./bootstrap");
import { createApp, getCurrentInstance, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import Layout from "./Shared/Layout";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue";
import VueChartkick from "vue-chartkick";
import { Chart } from "chart.js";
import Chartkick from "vue-chartkick";
import Tabs from "./Shared/Tabs";

InertiaProgress.init({
    color: "navy",
    showSpinner: true,
});

createInertiaApp({
    resolve: (name) => {
        let page = require(`./Pages/${name}`).default;

        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin, ZiggyVue)
            .use(VueChartkick)
            .mixin({ methods: { route: window.route } }) //ziggy
            .component("Link", Link)
            .component("Head", Head)
            .component("Tabs", Tabs)
            .mount(el);
    },

    title: (title) => "Pain Analysis App - " + title,
});
