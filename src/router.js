import { createWebHistory, createRouter } from "vue-router";
import Home from "./components/Home.vue";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
// lazy-loaded
const Profile = () => import("./components/Profile.vue")
const Tool = () => import("./components/tool/Tool.vue")
const ToolRead = () => import("./components/tool/ToolRead.vue")
const ToolAdd = () => import("./components/tool/ToolAdd.vue")
const Operation = () => import("./components/operation/Operation.vue")
const OperationAdd = () => import("./components/operation/OperationAdd.vue")
const OperationRead = () => import("./components/operation/OperationRead.vue")
const Category = () =>import("./components/category/Category.vue")
const CategoryAdd = () =>import("./components/category/CategoryAdd.vue")
const CategoryRead = () =>import("./components/category/CategoryRead.vue")
const BoardAdmin = () => import("./components/BoardAdmin.vue")
const BoardModerator = () => import("./components/BoardModerator.vue")
const BoardUser = () => import("./components/BoardUser.vue")

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/home",
        component: Home,
    },
    {
        path: "/login",
        component: Login,
    },
    {
        path: "/register",
        component: Register,
    },
    //------------------------- Tool -------------------------//
    {
        path: "/tool",
        name: "tools",
        // lazy-loaded
        component: Tool,
    },
    {
        path: "/tool/:id",
        name: "tool",
        // lazy-loaded
        component: ToolRead,
    },
    {
        path: "/toolAdd",
        name: "toolAdd",
        // lazy-loaded
        component: ToolAdd,
    },
    //------------------------- Operation -------------------------//
    {
        // Browse
        path: "/operation",
        name: "operations",
        // lazy-loaded
        component: Operation,
    },
    {
        // Add
        path: "/operationAdd",
        name: "operationAdd",
        // lazy-loaded
        component: OperationAdd,
    },
    {
        // Read
        path: "/operation/:id",
        name: "operation",
        // lazy-loaded
        component: OperationRead,
    },
    //------------------------- Category -------------------------//
    {
        // Browse
        path: "/category",
        name: "categories",
        // lazy-loaded
        component: Category,
    },
    {
        // Add
        path: "/categoryAdd",
        name: "categoryAdd",
        // lazy-loaded
        component: CategoryAdd,
    },
    {
        // Read
        path: "/category/:id",
        name: "category",
        // lazy-loaded
        component: CategoryRead,
    },
    //-------------------------------------------------------------//
    {
        path: "/profile",
        name: "profile",
        // lazy-loaded
        component: Profile,
    },
    {
        path: "/admin",
        name: "admin",
        // lazy-loaded
        component: BoardAdmin,
    },
    {
        path: "/mod",
        name: "moderator",
        // lazy-loaded
        component: BoardModerator,
    },
    {
        path: "/user",
        name: "user",
        // lazy-loaded
        component: BoardUser,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;