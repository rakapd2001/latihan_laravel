import { createRouter, createWebHistory } from 'vue-router'
import Index from '../views/posts/Index.vue'
import Create from '../views/posts/Create.vue'
import Edit from '../views/posts/Edit.vue'
import Show from '../views/posts/Show.vue'

const routes = [
    { path: '/', name: 'posts.index', component: Index },
    { path: '/posts/create', name: 'posts.create', component: Create },
    { path: '/posts/:id', name: 'posts.show', component: Show },
    { path: '/posts/:id/edit', name: 'posts.edit', component: Edit },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
