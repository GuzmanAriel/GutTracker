import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import Layout from "./Shared/Layout";
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faFaceSmile } from '@fortawesome/free-regular-svg-icons'
import { faFaceFrown } from '@fortawesome/free-regular-svg-icons'
import { faPoop } from '@fortawesome/free-solid-svg-icons'
import { faUtensils } from '@fortawesome/free-solid-svg-icons'
import { faFaceMeh } from '@fortawesome/free-regular-svg-icons'

/* add icons to the library */
library.add(faFaceSmile, faFaceFrown, faPoop, faUtensils, faFaceMeh)

createInertiaApp({
    resolve: name => {
        let page = require(`./Pages/${name}`).default;

        if(page.layout === undefined){
            page.layout = Layout;
        }


        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link)
            .component("Head", Head)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },

    title: title => `My App - ${title}`
});

InertiaProgress.init({
    color: "red",
    showSpinner: true,
});
