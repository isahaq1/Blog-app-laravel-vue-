import { createWebHistory, createRouter } from "vue-router";

const routes =  [
  {
    path: "/",
    alias: "/postlist",
    name: "postlist",
    component: () => import("./components/FrontPage")
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;