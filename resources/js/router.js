// gestione dipendenze
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Contacts from "./pages/Contacts";
import About from "./pages/About";
import Blog from "./pages/Blog";
import Post from "./pages/Post";
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/contacts",
            name: "contacts",
            component: Contacts
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: '/blog/:slug',
             name: 'post',
             component: Post
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;
