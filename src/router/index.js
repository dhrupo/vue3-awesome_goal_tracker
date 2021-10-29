import { createWebHistory, createRouter } from "vue-router";
import Home from "../pages/Home.vue";
import About from "../pages/About.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
];

const router = createRouter({
  history: createWebHistory('wordpress/wp-admin/admin.php'),
  routes,
});


export default router;